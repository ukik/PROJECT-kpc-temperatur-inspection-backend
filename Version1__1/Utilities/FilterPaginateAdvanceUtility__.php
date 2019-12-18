<?php

# ?column=uuid&direction=desc&per_page=2&page=1&search_column=uuid&search_operator=like&search_query_1=8&search_query_2=

# support eager 2 deep, example: relationship.column
# support massive data up to 50000 or even more (estimation)
# clustering by year & month

trait FilterPaginateAdvanceUtility__
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

        // $column             = $request->column;
        $direction          = $request->direction;
        $per_page           = $request->per_page;
        $page               = $request->page;
        $search_column      = $request->search_column;
        $search_operator    = $request->search_operator;
        $search_query_1     = $request->search_query_1 ? $request->search_query_1 : "";
        $search_query_2     = $request->search_query_2 ? $request->search_query_2 : "";

        $year               = $request->year;
        $month              = $request->month;        

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
            "search_query_2"    => $search_query_2,

            "year"              => $year, 
            "month"             => $month,
        ];

        $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

        $v = Validator::make($params, [
            // 'column'            => 'required|in:' . implode(',', $filter),
            'direction'         => 'required|in:asc,desc',
            'per_page'          => 'required|integer|min:1',
            'search_operator'   => 'required|in:' . implode(',', array_keys($this->operators)),
            'search_column'     => 'required|in:' . implode(',', $filter),
            'search_query_1'    => 'max:255',
            'search_query_2'    => 'max:255',

            "year"              => 'required|numeric|digits_between:4,4', 
            "month"             => 'required|digits_between:2,2|in:'.$month_validation,             
        ]);

        if ($v->fails()) {
            dd($v->messages());
        }

        $prefix_table = $prefix == null ? $this->table : strval($prefix."{$year}_{$month}");

        $query = $query
            // ->orderBy($request->sortBy, $request->direction)
            ->from($prefix_table)
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
        return $query;
    }

    protected function isRelatedColumn($request)
    {
        return strpos($request->search_column, '.') !== false;
    }

    protected function queryColumnFilter($column, $request, $relation)
    {
        $search_column = explode('.', $request);
        $final_column = [];

        $dynamic_table = strval("_".request()->year."_".request()->month);
        
        foreach ($search_column as $search_key => $search_value) {
            foreach ($relation as $relation_key => $relation_value) {
                if ($search_value == $relation_key) {
                    // dynamic table
                    // $final_column[$search_key] = $relation_value.$dynamic_table;

                    // static table
                    $final_column[$search_key] = $relation_value;
                }
            }
        }

        return $final_column = implode(',', $final_column) . '.' . $column;
        // $reduce = array_pop($chunkColumn);
    }

    public function scopeSortFilter($query)
    {
        // belum selesai, rencananya dipakai untuk sortBy
        $relation = $this->relation_name;

        $search_column = explode('.', request()->sortBy);
        $final_column = [];

        // $dynamic_table = strval("_".request()->year."_".request()->month);
        
        // dd($this->table_session, 11);

        foreach ($search_column as $search_key => $search_value) {
            foreach ($relation as $relation_key => $relation_value) {
                // dd($search_value, $relation_key);
                if(count($search_column) > 1) {
                    if ($search_value == $relation_key) {
                        // dynamic table
                        // $final_column[$search_key] = $relation_value.$dynamic_table;

                        switch ($search_value) {
                            case 'one_mutation_inspection_information':
                            case 'many_mutation_inspection':
                                $final_column[$search_key] = $relation_value."_{$this->table_suffix}";
                                break;
                            
                            default:
                                $final_column[$search_key] = $relation_value;
                                break;
                        }
                    }
                } else {
                    switch ($search_value) {
                        case 'one_mutation_inspection_information':
                        case 'many_mutation_inspection':
                            $final_column[$search_key] = $relation_value."_{$this->table_suffix}";
                            break;
                        
                        default:
                            $final_column[$search_key] = $relation_value;
                            break;
                    }
                }
            }
        }
        // $final_column = implode(',', $final_column) . '.' . request()->direction;
dd($final_column);
        $query->orderBy(implode(',', $final_column), request()->direction);
        // return $final_column = implode(',', $final_column) . '.' . $column;
        // $reduce = array_pop($chunkColumn);
    }

    protected function buildQuery($column, $operator, $request, $query)
    {
        $relation = $this->relation_name;

        function queryArrayErrorHandler($search_query_1)
        {
            if (!$search_query_1) {
                return array('""');
            }
            return explode(',', $search_query_1);
        }

        switch ($operator) {
            case 'equal_to':
            case 'not_equal':
            case 'less_than':
            case 'greater_than':
            case 'less_than_or_equal_to':
            case 'greater_than_or_equal_to':
                $query->where($this->queryColumnFilter($column, $request->search_column, $relation), $this->operators[$operator], $request->search_query_1)
                    ->orderBy($this->queryColumnFilter($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'in':
                $query->whereIn($this->queryColumnFilter($column, $request->search_column, $relation), queryArrayErrorHandler($request->search_query_1))
                    ->orderBy($this->queryColumnFilter($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'not_in':
                $query->whereNotIn($this->queryColumnFilter($column, $request->search_column, $relation), queryArrayErrorHandler($request->search_query_1))
                    ->orderBy($this->queryColumnFilter($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'like':
                $query->where($this->queryColumnFilter($column, $request->search_column, $relation), 'like', '%' . $request->search_query_1 . '%')
                    ->orderBy($this->queryColumnFilter($column, $request->sortBy, $relation), $request->direction);
                break;
            case 'between':
                $query->whereBetween($this->queryColumnFilter($column, $request->search_column, $relation), [
                    $request->search_query_1,
                    $request->search_query_2
                ])
                    ->orderBy($this->queryColumnFilter($column, $request->sortBy, $relation), $request->direction);
                break;
            default:
                throw new Exception('Invalid Search Operator', 1);
                break;
        }

        return $query;
    }

    public function scopeFromTable($query, $prefix_table) 
    {
        $year = request()->year;
        $month = request()->month;

        $form = [
            "year"              => $year, 
            "month"             => $month,
        ];

        $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";
        $validator = \Validator::make($form, [
            "year"              => 'required|numeric|digits_between:4,4', 
            "month"             => 'required|digits_between:2,2|in:'.$month_validation, 
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }    

        $query->from( $prefix_table.request()->year."_".request()->month);
    }           
}
