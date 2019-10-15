<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class TableEmployeeController extends Controller
{
    use \TableEmployeeValidator;
    use \TableEmployeeSchema;

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
