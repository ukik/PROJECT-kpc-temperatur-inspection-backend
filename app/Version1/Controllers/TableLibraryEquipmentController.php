<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryEquipmentController extends Controller
{
    use \TableLibraryEquipmentValidator;
    use \TableLibraryEquipmentSchema;

    public function index(Request $request)
    {
        // $data = null;
        switch (request()->type) {
            case "select":
                $data = \TableLibraryEquipmentModel::orderBy('no', 'asc')
                    ->select(['uuid', 'name_equipment', 'label_equipment'])
                    ->get();
                break;
            default:
                $data = \TableLibraryEquipmentModel::orderBy(request()->sortBy, request()->direction)
                    ->filterPaginate();
                break;
        }

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function store(Request $request)
    {
        $this->libraryEquipmentValidator($form);

        $data = \TableLibraryEquipmentModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableLibraryEquipmentModel::findOrFail($uuid)->first();

        return resolve([
            $payload    = $data,
            $role       = Auth::user()->position_employee,
            $token      = JWTRefresh(),
            $auth       = true,
        ]);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_equipment'   => request()->label_equipment,
            'name_equipment'    => request()->name_equipment,
        ];

        $this->libraryEquipmentValidator($form);

        $data = \TableLibraryEquipmentModel::findOrFail(request()->uuid)->update($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function destroy(Request $request, $uuid)
    {
        \TableLibraryEquipmentModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
