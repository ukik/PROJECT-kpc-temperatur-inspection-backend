<?php

# ?column=uuid&direction=desc&per_page=2&page=1&search_column=uuid&search_operator=like&search_query_1=8&search_query_2=

# unsupport eager

trait FilterPaginateUtility
{

    protected $operators = [
        'equal_to'                  => '=',
        'not_equal'                 => '<>',
        'less_than'                 => '<',
        'greater_than'              => '>',
        'less_than_or_equal_to'     => '<=',
        'greater_than_or_equal_to'  => '>=',
        'in'                        => 'IN',
        'not_in'                    => 'NOT_IN',
        'like'                      => 'LIKE',
        'between'                   => 'BETWEEN'
    ];

    public function scopeFilterPaginate($query)
    {
        $request = request();

        $filter = $this->filter;

        // $column             = $request->column;
        $direction          = $request->direction;
        $per_page           = $request->per_page;
        $page               = $request->page;
        $search_column      = $request->search_column;
        $search_operator    = $request->search_operator;
        $search_query_1     = $request->search_query_1;
        $search_query_2     = $request->search_query_2;

        if (empty($search_query_1)) {
            $search_operator = 'not_in';
        }

        $params = [
            // "column"            => $column,
            "direction"         => $direction,
            "per_page"          => $per_page,
            "page"              => $page,
            "search_column"     => $search_column,
            "search_operator"   => $search_operator,
            "search_query_1"    => $search_query_1,
            "search_query_2"    => $search_query_2
        ];

        $v = Validator::make($params, [
            // 'column'            => 'required|in:' . implode(',', $filter),
            'direction'         => 'required|in:asc,desc',
            'per_page'          => 'required|integer|min:1',
            'search_operator'   => 'required|in:' . implode(',', array_keys($this->operators)),
            'search_column'     => 'required|in:' . implode(',', $filter),
            'search_query_1'    => 'max:255',
            'search_query_2'    => 'max:255'
        ]);

        if ($v->fails()) {
            dd($v->messages());
        }

        return $query
            ->orderBy($request->column, $request->direction)
            ->where(function ($query) use ($request, $params) {
                // check if search query is empty
                if ($request->has('search_query_1')) {
                    // determine the type of search_column
                    // check if its related model, eg: customer.id
                    if ($this->isRelatedColumn($request)) {
                        list($relation, $relatedColumn) = explode('.', $request->search_column);
                        return $query->whereHas($relation, function ($query) use ($relatedColumn, $request, $params) {
                            return $this->buildQuery(
                                $relatedColumn,
                                $params['search_operator'], //$request->search_operator,
                                $request,
                                $query
                            );
                        });
                    } else {
                        // regular column
                        return $this->buildQuery(
                            $request->search_column,
                            $params['search_operator'], //$request->search_operator,
                            $request,
                            $query
                        );
                    }
                }
            })
            ->paginate($request->per_page);
    }

    protected function isRelatedColumn($request)
    {
        return strpos($request->search_column, '.') !== false;
    }

    protected function buildQuery($column, $operator, $request, $query)
    {
        switch ($operator) {
            case 'equal_to':
            case 'not_equal':
            case 'less_than':
            case 'greater_than':
            case 'less_than_or_equal_to':
            case 'greater_than_or_equal_to':
                $query->where($column, $this->operators[$operator], $request->search_query_1);
                break;
            case 'in':
                $query->whereIn($column, explode(',', $request->search_query_1));
                break;
            case 'not_in':
                $query->whereNotIn($column, explode(',', $request->search_query_1));
                break;
            case 'like':
                $query->where($column, 'like', '%' . $request->search_query_1 . '%');
                break;
            case 'between':
                $query->whereBetween($column, [
                    $request->search_query_1,
                    $request->search_query_2
                ]);
                // ->whereUuid('2');
                break;
            default:
                throw new Exception('Invalid Search Operator', 1);
                break;
        }

        return $query;
    }
}
