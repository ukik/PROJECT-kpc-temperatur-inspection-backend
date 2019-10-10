<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class TableEmployeeController extends Controller
{
    use \TableEmployeeValidator;

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

        $data = \TableEmployeeModel::orderBy(request()->sortBy, request()->direction)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableEmployeeModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'                      => request()->uuid,
            'name_employee'             => request()->name_employee,
            'position_employee'         => request()->position_employee,
            'nik_employee'              => request()->nik_employee,
            'telpon_employee'           => request()->telpon_employee,
            'email_employee'            => request()->email_employee,
            'birth_place_employee'      => request()->birth_place_employee,
            'birth_date_employee'       => request()->birth_date_employee,
            'gender_employee'           => request()->gender_employee,
            'marital_employee'          => request()->marital_employee,
            'address_employee'          => request()->address_employee,
            'password_employee'         => request()->password_employee,
            'photo_employee'            => request()->photo_employee,
        ];

        $this->employeeValidator($form);

        $data = \TableEmployeeModel::findOrFail(request()->uuid)->update($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function destroy(Request $request, $uuid)
    {
        \TableEmployeeModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
