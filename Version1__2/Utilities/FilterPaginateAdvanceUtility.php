<?php

# ?column=uuid&direction=desc&per_page=2&page=1&search_column=uuid&search_operator=like&search_query_1=8&search_query_2=

# support modify eager 2 deep, example: relationship.column
# support massive data up to 50000 or even more (estimation)
# clustering by year & month

trait FilterPaginateAdvanceUtility
{

    use \RelationNameStatic;

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

    public function scopeFilterPaginate($query, $prefix = null)
    {
        $request = request();

        $filter = $this->filter;

        $direction          = $request->direction;
        $per_page           = $request->per_page;
        $page               = $request->page;
        $search_column      = $request->search_column;
        $search_operator    = $request->search_operator;
        $search_query_1     = $request->search_query_1 ? $request->search_query_1 : "";
        $search_query_2     = $request->search_query_2 ? $request->search_query_2 : "";

        if (empty($search_query_1)) {
            $search_operator = 'not_in';
        }

        $params = [
            "direction"         => $direction,
            "per_page"          => $per_page,
            "page"              => $page,
            "search_column"     => $search_column,
            "search_operator"   => $search_operator,
            "search_query_1"    => $search_query_1,
            "search_query_2"    => $search_query_2,
        ];

        // $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

        $validator = Validator::make($params, [
            'direction'         => 'required|in:asc,desc',
            'per_page'          => 'required|integer|min:1',
            'search_operator'   => 'required|in:' . implode(',', array_keys($this->operators)),
            'search_column'     => 'required|in:' . implode(',', $filter),
            'search_query_1'    => 'max:255',
            'search_query_2'    => 'max:255',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation"
            ]);
        }

        return $query
            ->from($this->table)
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
            })->paginate($request->per_page);
    }

    protected function isRelatedColumn($request)
    {
        return strpos($request->search_column, '.') !== false;
    }

    protected function columnFilter($column, $request, $relation)
    {
        $search_column = explode('.', $request);
        $final_column = [];

        foreach ($search_column as $search_key => $search_value) {
            foreach ($relation as $relation_key => $relation_value) {
                if ($search_value == $relation_key) {
                    $final_column[$search_key] = $relation_value;
                }
            }
        }

        if (count($final_column) <= 0) {
            return $column;
        }
        $final_column = implode(',', $final_column) . '.' . $column;
        return $final_column;
    }

    protected function columnSort($column, $request, $relation)
    {
        $search_column = explode('.', $request);

        if (count($search_column) <= 1) {
            return $column;
        } else {
            $relation = $this->relation_name;
            $cluster = $this->relation_cluster;

            $final_column = [];

            foreach ($search_column as $search_key => $search_value) {
                foreach ($relation as $relation_key => $relation_value) {
                    if ($search_value == $relation_key) {
                        foreach ($cluster as $cluster_key => $cluster_value) {
                            if ($relation_key == $cluster_key) {
                                $final_column[$search_key] = $relation_value . $this->clusterGeneratorKey($relation_value);
                            } else {
                                $final_column[$search_key] = $relation_value;
                            }
                        }
                    }
                }
            }

            return $final_column = implode(',', $final_column) . '.' . $column;
            // dd($final_column);

        }
    }

    public function scopeSortFilter($query)
    {
        $search_column = explode('.', request()->sortBy);

        if (count($search_column) <= 1) {
            return $query->orderBy(array_pop($search_column), request()->direction);
        } else {
            $relation = $this->relation_name;
            $cluster = $this->relation_cluster;

            $final_column = [];

            foreach ($search_column as $search_key => $search_value) {
                foreach ($relation as $relation_key => $relation_value) {
                    if ($search_value == $relation_key) {
                        foreach ($cluster as $cluster_key => $cluster_value) {
                            if ($relation_key == $cluster_key) {
                                $final_column[$search_key] = $relation_value . $this->table_suffix;
                            } else {
                                $final_column[$search_key] = $relation_value;
                            }
                        }
                    }
                }
            }

            $final_column = implode(',', $final_column) . '.' . array_pop($search_column);
            return $query->orderBy($final_column, request()->direction);
        }
    }

    protected function emptyHandler($search_query_1)
    {
        if (!$search_query_1) {
            return array('""');
        }
        return explode(',', $search_query_1);
    }

    protected function buildQuery($column, $operator, $request, $query)
    {
        $relation = $this->relation_name;

        switch ($operator) {
            case 'equal_to':
            case 'not_equal':
            case 'less_than':
            case 'greater_than':
            case 'less_than_or_equal_to':
            case 'greater_than_or_equal_to':
                $query->where(
                    $this->columnFilter($column, $request->search_column, $relation),
                    $this->operators[$operator],
                    $request->search_query_1
                )
                    ->orderBy($this->columnSort($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'in':
                $query->whereIn(
                    $this->columnFilter($column, $request->search_column, $relation),
                    $this->emptyHandler($request->search_query_1)
                )
                    ->orderBy($this->columnSort($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'not_in':
                $query->whereNotIn(
                    $this->columnFilter($column, $request->search_column, $relation),
                    $this->emptyHandler($request->search_query_1)
                )
                    ->orderBy($this->columnSort($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'like':
                $query->where(
                    $this->columnFilter($column, $request->search_column, $relation),
                    'like',
                    '%' . $request->search_query_1 . '%'
                )
                    ->orderBy($this->columnSort($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'between':
                $query->whereBetween(
                    $this->columnFilter($column, $request->search_column, $relation),
                    [
                        $request->search_query_1,
                        $request->search_query_2
                    ]
                )
                    ->orderBy($this->columnSort($column, $request->sortBy, $relation), $request->direction);
                break;
            default:
                throw new Exception('Invalid Search Operator', 1);
                break;
        }

        return $query;
    }
}
