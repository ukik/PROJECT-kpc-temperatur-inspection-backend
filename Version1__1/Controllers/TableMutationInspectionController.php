<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionController extends Controller
{
    use \TableMutationInspectionValidator;
    // use \TableMutationInspectionSchema;

    public function index(Request $request)
    {
        // $data = \TableMutationInspectionModel::with([
        //     'belong_employee' => function ($query) {
        //         return $query->select(['uuid', 'name_employee']);
        //     },
        //     'belong_library_location' => function ($query) {
        //         return $query->select(['uuid', 'name_location']);
        //     },
        //     'belong_library_equipment' => function ($query) {
        //         return $query->select(['uuid', 'name_equipment']);
        //     },
        // ])
        // ->sortFilter()
        // ->filterPaginate();

        $data = \ViewMutationInspectionModel::groupBy('uuid')->filterPaginate();
        // SqlWithBinding($data->toSql(), $data->getBindings());
        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true
        );
    }

    public function store(Request $request)
    {
        $this->mutationInspectionValidator($form);

        $data = \TableMutationInspectionModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableMutationInspectionModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'                          => request()->uuid,
            'uuid_tb_employee'              => request()->uuid_tb_employee,
            'uuid_tb_inspection'            => request()->uuid_tb_inspection,
            'uuid_tb_schedule'              => request()->uuid_tb_schedule,
            'uuid_tb_equipment'             => request()->uuid_tb_equipment,
            'uuid_tb_location'              => request()->uuid_tb_location,
            'place_inspection'              => request()->place_inspection == 'kanan' ? 'A' : 'B',
            'condition_inspection'          => condition_inspection(request()->condition_inspection),
            'grease_shoot_inspection'       => request()->grease_shoot_inspection,
            'weather_inspection'            => weather_inspection(request()->weather_inspection),
            'temperature_inspection'        => request()->temperature_inspection,
            'rain_inspection'               => request()->rain_inspection,
            'current_upnormal_inspection'   => current_upnormal_inspection(request()->current_upnormal_inspection),
            'last_upnormal_inspection'      => last_upnormal_inspection(request()->last_upnormal_inspection),
            'screenshoot_inspection'        => request()->screenshoot_inspection,
            'valid_inspection'              => valid_inspection(request()->valid_inspection),
        ];

        $validator = \Validator::make($form, [
            'uuid'                          => 'required|string|max:40|min:40',
            'uuid_tb_employee'              => 'required|string|max:40|min:40',
            // 'uuid_tb_inspection'            => 'required|string|max:40|min:40', // self-relationship
            'uuid_tb_equipment'             => 'required|string|max:40|min:40',
            'uuid_tb_schedule'              => 'required|string|max:40|min:40',
            'uuid_tb_location'              => 'required|string|max:40|min:40',
            'place_inspection'              => 'required|in:A,B',
            // 'condition_inspection'          => 'required|in:1,2,3', // salah waktu seeder, sudah diperbaiki seedernya,
            'grease_shoot_inspection'       => 'required|numeric|max:100',
            'weather_inspection'            => 'required|in:1,2,3,4,5,6',
            'temperature_inspection'        => 'required|numeric|max:100',
            // 'temperature_inspection'        => 'required|numeric|regex:/^\d+(\.\d{3,2})?$/',
            'rain_inspection'               => 'required|numeric|max:100',
            // 'rain_inspection'               => 'required|numeric|regex:/^\d+(\.\d{3,2})?$/',
            'current_upnormal_inspection'   => 'required|in:0,1',
            'last_upnormal_inspection'      => 'required|in:0,1',
            // 'screenshoot_inspection'        => 'imageable',
            'valid_inspection'              => 'required',
        ]);

        // $this->mutationInspectionValidator($form);
        // return request();

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
        }

        $data = \ViewMutationInspectionModel::whereUuid(request()->uuid);
        // return SqlWithBinding($data->toSql(), $data->getBindings());
        $data->first()->one_mutation_inspection->update(['valid_inspection' => "1"]);

        return resolver(
            $request = $request,
            $payload = $data->first(), //$data->groupBy('uuid')->first(),
            $auth = true,
            $model = 'mutation/inspection@update'
        );
    }

    public function destroy(Request $request, $uuid)
    {
        \TableMutationInspectionModel::whereUuid(request()->uuid)->delete();

        return resolver(
            $request = $request,
            $payload = request(), //$data->groupBy('uuid')->first(),
            $auth = true,
            $model = 'mutation/inspection@delete'
        );
    }
}
