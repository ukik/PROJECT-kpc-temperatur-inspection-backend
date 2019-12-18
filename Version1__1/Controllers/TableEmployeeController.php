<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class TableEmployeeController extends Controller
{
    use \TableEmployeeValidator;
    // use \TableEmployeeSchema;

    public function index(Request $request)
    {
        // return $data = \EmployeeModel::first()->mutation_inspection[0]->library_equipment;
        // return SqlWithBinding($data->toSql(), $data->getBindings());
        // // return $data = \MutationInspectionModel::with('employees')->first();
        // return $data = \MutationInspectionModel::with('library_equipment')->first();
        // return SqlWithBinding($data->toSql(), $data->getBindings());

        // return $data = \LibraryLocationModel::first()->mutation_inspection;
        // return $data = \LibraryEquipmentModel::first()->mutation_inspection;
        // return $data = \EmployeeModel::with('mutation_inspection.mutation_inspection_information')->get();
        // // return $data = \EmployeeModel::first()->mutation_inspection;

        // return $data = \MutationInspectionModel::first()->library_equipment;
        // return $data = \EmployeeModel::first()->trough_library_equipment;
        // return $data = \EmployeeModel::filterPaginate();
        // $data = null;
        switch (request()->type) {
            case "select":
                $data = \TableEmployeeModel::orderBy('no', 'asc')
                    ->select(['uuid', 'name_employee'])
                    ->get();
                break;
            default:
                $direction = request()->direction == null ? 'desc' : request()->direction;
                $data = \TableEmployeeModel::orderBy(request()->sortBy, $direction)
                    ->filterPaginate();
                break;
        }

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true,
            $model = 'employee@index'
        );
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableEmployeeModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function update(Request $request)
    {
        // return request();
        $form =  [
            'uuid'                      => request()->uuid,
            'name_employee'             => request()->name_employee,
            'position_employee'         => strval(request()->position_employee),
            'nik_employee'              => request()->nik_employee,
            'telpon_employee'           => request()->telpon_employee,
            'email_employee'            => request()->email_employee,
            'birth_place_employee'      => request()->birth_place_employee,
            'birth_date_employee'       => request()->birth_date_employee,
            'gender_employee'           => strval(request()->gender_employee),
            'marital_employee'          => strval(request()->marital_employee),
            'address_employee'          => request()->address_employee,
            'password_employee'         => request()->password_employee,
            // 'plain_password_employee'   => request()->plain_password_employee,
            'photo_employee'            => request()->photo_employee,
            'verification_employee'     => strval(request()->verification_employee),
            'disable_employee'          => request()->disable_employee ? '1' : '0',
        ];

        $validator = \Validator::make($form, [
            'uuid'                      => 'required|string|max:40|min:40',
            'name_employee'             => 'required|string|max:50',
            'position_employee'         => 'required|in:0,1,2',
            'nik_employee'              => 'required|string|digits:16',
            'telpon_employee'           => 'required|max:20',
            'email_employee'            => 'required|email|max:50',
            'birth_place_employee'      => 'required|string|max:50',
            'birth_date_employee'       => 'required|string|max:10',
            'gender_employee'           => 'required|in:0,1',
            'marital_employee'          => 'required|in:0,1',
            'address_employee'          => 'required|string',
            'password_employee'         => 'required|string|max:50',
            // 'plain_password_employee'   => 'required|string|max:50',
            // 'photo_employee'            => 'imageable',
            'verification_employee'     => 'required|in:0,1',
            'disable_employee'          => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
        }

        $data = \TableEmployeeModel::whereUuid(request()->uuid);
        $data->update($form);

        return resolver(
            $request = $request,
            $payload = $data->first(),
            $auth = true,
            $model = 'employee@update'
        );
    }

    public function destroy(Request $request, $uuid)
    {
        \TableEmployeeModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
