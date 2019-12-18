<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionUpdateController extends Controller
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

        $data = \ViewMutationInspectionUpdateModel::paginate();

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true
        );
    }

    public function store(Request $request)
    {
        // $this->mutationInspectionValidator($form);
        return request();

        $data = \TableMutationInspectionModel::whereUuid(request()->uuid)
            ->update(['revision_inspection' => 1])
            ->first();

        if ($data && request()->action == "renewal") {
            \TableMutationInspectionUpdateModel::updateOrCreate(['uuid' => $data->uuid], [
                'uuid'                          => "TIU-" . \Faker\Factory::create()->uuid,
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
            ]);
        }

        // $data = \TableMutationInspectionModel::create($form)->filterPaginate();

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true
        );
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
            'equipment_inspection'          => request()->equipment_inspection,
            'location_inspection'           => request()->location_inspection,
            'place_inspection'              => request()->place_inspection,
            'condition_inspection'          => request()->condition_inspection,
            'grease_shoot_inspection'       => request()->grease_shoot_inspection,
            'weather_inspection'            => request()->weather_inspection,
            'temperature_inspection'        => request()->temperature_inspection,
            'rain_inspection'               => request()->rain_inspection,
            'current_upnormal_inspection'   => request()->current_upnormal_inspection,
            'last_upnormal_inspection'      => request()->last_upnormal_inspection,
            'screenshoot_inspection'        => request()->screenshoot_inspection,
        ];

        $this->mutationInspectionValidator($form);

        $data = \TableMutationInspectionModel::findOrFail(request()->uuid)->update($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function destroy(Request $request, $uuid)
    {
        \TableMutationInspectionModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
