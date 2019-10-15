<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ViewReportModel;

class ViewReportController extends Controller
{
    use \ViewReportSchema;

    public function index(Request $request)
    {
        // validate params + create session table name
        paramMonthYearValidator();
                
        $data = null;
        try {
            // orderBy(request()->sortBy, request()->direction)->
            switch ($request->search_column) {
                case 'week':
                    $data = ViewReportModel::groupBy(['day', 'uuid_tb_equipment', 'uuid_tb_location'])->filterPaginate();
                    break;
                case 'month':
                    $data = ViewReportModel::groupBy(['week', 'uuid_tb_equipment', 'uuid_tb_location'])->filterPaginate();
                    break;
                case 'quartal':
                    $data = ViewReportModel::groupBy(['month', 'uuid_tb_equipment', 'uuid_tb_location'])->filterPaginate();
                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        // return response()
        //     ->json([\ViewReportModel::filterPaginate()]);
        // return SqlWithBinding($data->toSql(), $data->getBindings());

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \ViewReportModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }
}
