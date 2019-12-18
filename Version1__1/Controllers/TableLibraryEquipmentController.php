<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryEquipmentController extends Controller
{
    use \TableLibraryEquipmentValidator;
    // use \TableLibraryEquipmentSchema;

    public function index(Request $request)
    {
        switch (request()->type) {
            case "select":
                $data = \TableLibraryEquipmentModel::orderBy('no', 'asc')
                    ->select(['uuid', 'name_equipment', 'label_equipment'])
                    ->get();
                break;
            default:
                $direction = request()->direction == null ? 'desc' : request()->direction;
                $data = \TableLibraryEquipmentModel::orderBy(request()->sortBy, $direction)
                    ->filterPaginate();
                break;
        }

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true,
            $model = 'library/equipment@index'
        );
    }

    public function store(Request $request)
    {
        $this->libraryEquipmentValidator($form);

        $data = \TableLibraryEquipmentModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableLibraryEquipmentModel::findOrFail($uuid);

        return resolver(
            $request = $request,
            $payload = $data->first(),
            $auth = true,
            $model = 'library/equipment@show'
        );

        // return resolve([
        //     $payload    = $data,
        //     $role       = Auth::user()->position_employee,
        //     $token      = JWTRefresh(),
        //     $auth       = true,
        // ]);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_equipment'   => request()->label_equipment, // harus lowercase
            'name_equipment'    => request()->name_equipment,
        ];

        $label = [];
        for ($i = 0; $i <= 10; $i++) {
            if ($i < 10) {
                $label[$i] = "E0{$i}";
            } else {
                $label[$i] = "E{$i}";
            }
        }

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|max:40|min:40',
            'label_equipment'   => 'required|in:' . implode(',', $label),
            'name_equipment'    => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
        }

        $data = \TableLibraryEquipmentModel::whereUuid(request()->uuid);
        $data->update($form);

        return resolver(
            $request = $request,
            $payload = $data->first(),
            $auth = true,
            $model = 'library/equipment@update'
        );
    }

    public function destroy(Request $request, $uuid)
    {
        \TableLibraryEquipmentModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
