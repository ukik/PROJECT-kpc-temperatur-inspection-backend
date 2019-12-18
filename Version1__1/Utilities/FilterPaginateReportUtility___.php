<?php

# ?column=uuid&direction=desc&per_page=2&page=1&search_column=uuid&search_operator=like&search_interval=8&search_query_2=

# support eager 2 deep, example: relationship.column

trait FilterPaginateReportUtility
{

    use \RelationNameStatic;

    protected $operators = [
        'equal_to'                  => '=',
    ];

    public function scopeFilterPaginate($query, $prefix = null, $row = 5)
    {
        $request = request();

        $filter = $this->filter;

        // below is additional object
        $search_column      = $request->search_column;
        $search_operator    = $request->search_operator;
        $search_interval    = $request->search_interval;
        // addition
        $place_inspection   = $request->place_inspection;
        $uuid_tb_equipment  = $request->uuid_tb_equipment;
        $uuid_tb_location   = $request->uuid_tb_location;

        $week               = $request->week;
        $year               = $request->year;

        $params = [
            'search_column'         =>  $search_column,
            'search_operator'       =>  $search_operator,
            'search_interval'       =>  $search_interval,
            // addition
            'place_inspection'      =>  $place_inspection,
            'uuid_tb_equipment'     =>  $uuid_tb_equipment,
            'uuid_tb_location'      =>  $uuid_tb_location,

            'week'                  =>  $week,
            'year'                  =>  $year,
        ];

        $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

        $v = Validator::make($params, [

            // below is additional object
            'search_column'         =>  'required',
            'search_operator'       =>  'required|in:' . implode(',', array_keys($this->operators)),
            'search_interval'       =>  'max:255',
            'year'                  =>  'required|digits:4',
            'uuid_tb_equipment'     =>  'required',
            'uuid_tb_location'      =>  'required',
            // 'place_inspection'      =>  'required|in:A,B',

            "year"                  => 'required|numeric|digits_between:4,4',
            "month"                 => $search_column == "month" ? 'required|digits_between:2,2|in:' . $month_validation : '',
        ]);

        if ($v->fails()) {
            dd($v->messages());
        }

        $prefix_table = $prefix == null ? $this->table : strval($prefix . "{$year}_{$month}");

        return $query
            // ->orderBy($request->sortBy, $request->direction)
            ->from($prefix_table)
            ->where(function ($query) use ($request, $params) {
                // check if search query is empty
                if ($request->has('search_column')) {
                    $this->isEagerColumn($query, $request, $params, $request->search_column);
                }
            })->paginate($row);

        // switch ($request->search_column) {
        //     case 'week':
        //         $query->groupBy(['day', 'uuid_tb_equipment', 'uuid_tb_location'])->paginate(5);
        //         break;
        //     case 'month':
        //         $query->groupBy(['week', 'uuid_tb_equipment', 'uuid_tb_location'])->paginate(5);
        //         break;
        //     case 'quartal':
        //         $query->groupBy(['month', 'uuid_tb_equipment', 'uuid_tb_location'])->paginate(5);
        //         break;
        // }

    }

    protected function isRelatedColumn($key)
    {
        return strpos($key, '.') !== false;
    }

    public function scopeSortFilter($query)
    {
        $search_column = explode('.', request()->sortBy);

        if (count($search_column) <= 1) {
            return $query->orderBy(array_pop($search_column), request()->direction);
        } else {
            // kolom sort tidak tersedia di table
            return $query;
        }
    }

    protected function isEagerColumn($query, $request, $params, $key)
    {
        // determine the type of search_column
        // check if its related model, eg: customer.id
        if ($this->isRelatedColumn($key)) {

            // list($relation, $relatedColumn) = explode('.', $request->search_column);
            list($relation, $relatedColumn) = explode('.', $key);

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

    protected function buildQuery($column, $operator, $request, $query)
    {
        // dd($_REQUEST);
        switch ($operator) {
            case 'equal_to':
                foreach ($_REQUEST as $key => $value) {
                    # code...
                    if ($key != 'search_operator' && $key != 'search_column' && $key != 'search_interval' && $key != 'place_inspection') {
                        $query
                            ->where($key, $this->operators[$operator], $value);
                    }
                }

                if ($request->place_inspection != null) {
                    $query
                        ->where('place_inspection', $this->operators[$operator], $request->place_inspection);
                }

                switch ($request->search_column) {
                    case 'quartal':
                        switch ($request->search_interval) {
                            case '1':
                                $query
                                    ->whereBetween('month', [1, 3]);
                                break;
                            case '1':
                                $query
                                    ->whereBetween('month', [4, 6]);
                                break;
                            case '1':
                                $query
                                    ->whereBetween('month', [7, 9]);
                                break;
                            case '1':
                                $query
                                    ->whereBetween('month', [10, 12]);
                                break;
                        }
                        break;

                    default:
                        $query
                            ->where($request->search_column, $this->operators[$operator], $request->search_interval);
                        break;
                }

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
            "month"             => 'required|digits_between:2,2|in:' . $month_validation,
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }

        // session for model
        // setter('table', request()->year."_".request()->month);

        $query->from($prefix_table . request()->year . "_" . request()->month);
    }
}
