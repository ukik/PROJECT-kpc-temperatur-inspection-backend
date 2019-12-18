<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ViewReportModel;

class ViewReportController extends Controller
{
    // use \ViewReportSchema;

    public function index(Request $request)
    {
        $data = null;
        try {
            switch ($request->search_column) {
                case 'week':
                    new ViewReportModel;

                    // dd(request()->place_inspection);

                    if ((getter('table_week_overlap'))) {
                        $data = \DB::table(getter('table_week'))->whereUuidTbEquipment(request()->uuid_tb_equipment)
                            ->whereUuidTbLocation(request()->uuid_tb_location)
                            ->wherePlaceInspection(request()->place_inspection)
                            ->whereWeek(request()->search_interval)
                            ->orderBy('day', 'asc')
                            ->groupBy(['day_name']);

                        $data = \DB::table(getter('table_week_overlap'))->whereUuidTbEquipment(request()->uuid_tb_equipment)
                            ->whereUuidTbLocation(request()->uuid_tb_location)
                            ->wherePlaceInspection(request()->place_inspection)
                            ->whereWeek(request()->search_interval)
                            ->orderBy('day', 'asc')
                            ->groupBy(['day_name'])->union($data)
                            ->get();
                    } else if ((getter('table_week'))) {
                        $data = \DB::table(getter('table_week'))->whereUuidTbEquipment(request()->uuid_tb_equipment)
                            ->whereUuidTbLocation(request()->uuid_tb_location)
                            ->wherePlaceInspection(request()->place_inspection)
                            ->whereWeek(request()->search_interval)
                            ->orderBy('day', 'asc')
                            ->groupBy(['day_name'])
                            ->get();
                    } else {
                        $data = ViewReportModel::whereUuidTbEquipment(request()->uuid_tb_equipment)
                            ->whereUuidTbLocation(request()->uuid_tb_location)
                            ->wherePlaceInspection(request()->place_inspection)
                            ->whereWeek(request()->search_interval)
                            ->orderBy('day', 'asc')
                            ->groupBy(['day_name'])
                            ->get();
                    }
                    // return SqlWithBinding($data->toSql(), $data->getBindings());
                    // $data->get();
                    break;
                case 'month':
                    $data = ViewReportModel::whereUuidTbEquipment(request()->uuid_tb_equipment)
                        ->whereUuidTbLocation(request()->uuid_tb_location)
                        ->wherePlaceInspection(request()->place_inspection)
                        ->where('month', (request()->search_interval))
                        ->orderBy('week', 'asc')
                        ->groupBy(['week'])
                        ->get();

                    // return SqlWithBinding($data->toSql(), $data->getBindings());
                    break;
                case 'quartal':
                    $data = ViewReportModel::whereUuidTbEquipment(request()->uuid_tb_equipment)
                        ->whereUuidTbLocation(request()->uuid_tb_location)
                        ->wherePlaceInspection(request()->place_inspection)
                        ->orderBy('month', 'asc')
                        ->groupBy(['month_name'])
                        ->get();
                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        // return response()
        //     ->json([\ViewReportModel::filterPaginate()]);
        // return SqlWithBinding($data->toSql(), $data->getBindings());

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true
        );
    }

    public function show(Request $request, $uuid)
    {
        $data = \ViewReportModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }
}
