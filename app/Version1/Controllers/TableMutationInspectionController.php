<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionController extends Controller
{
    use \TableMutationInspectionValidator;

    public function index(Request $request)
    {
        $data = \TableMutationInspectionModel::with([
            'belong_employee' => function ($query) {
                return $query->select(['uuid', 'name_employee']);
            },
            'belong_library_location' => function ($query) {
                return $query->select(['uuid', 'name_location']);
            },
            'belong_library_equipment' => function ($query) {
                return $query->select(['uuid', 'name_equipment']);
            },
        ])->orderBy(request()->sortBy, request()->direction)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function store(Request $request)
    {
        $form =  [
            'uuid'                          => 'TIS-' . uuid(),
            'uuid_tb_employee'              => request()->uuid_tb_employee,
            'uuid_tb_inspection'            => !request()->uuid_tb_inspection ?: NULL,
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
