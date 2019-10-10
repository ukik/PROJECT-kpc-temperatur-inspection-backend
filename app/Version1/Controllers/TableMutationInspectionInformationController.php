<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionInformationController extends Controller
{
    use \TableMutationInspectionInformationValidator;

    public function index(Request $request)
    {

        // http://localhost:8000/api/v1/mutation/inspection-information?column=belong_mutation_inspection.belong_library_equipment.name_equipment&direction=asc&per_page=25&page=1&search_column=belong_mutation_inspection.belong_library_equipment.name_equipment&search_operator=like&search_query_1=&search_query_2=

        // http://localhost:8000/api/v1/mutation/inspection-information?column=uuid&direction=asc&per_page=25&page=1&search_column=uuid&search_operator=like&search_query_1=&search_query_2=

        $data = \TableMutationInspectionInformationModel::with([
            'belong_employee' => function ($query) {
                return $query->select(['uuid_tb_employee', 'name_employee']);
            },
            'belong_library_location' => function ($query) {
                return $query->select(['uuid_tb_location', 'name_location']);
            },
            'belong_library_equipment' => function ($query) {
                return $query->select(['uuid_tb_equipment', 'name_equipment']);
            },
            'belong_mutation_inspection' => function ($query) {
                return $query->select(['uuid', 'place_inspection']);
            }
        ])->orderBy(request()->sortBy, request()->direction)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function store(Request $request)
    {
        $form =  [
            'uuid'                                => 'TIF-' . uuid(),
            'uuid_tb_inspection'                  => request()->uuid_tb_inspection,
            'label_inspection_information'        => request()->label_inspection_information,
            'description_inspection_information'  => request()->description_inspection_information,
        ];

        $this->mutationInspectionInformationValidator($form);

        $data = \TableMutationInspectionInformationModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableMutationInspectionInformationModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'                                => request()->uuid,
            'uuid_tb_inspection'                  => request()->uuid_tb_inspection,
            'label_inspection_information'        => request()->label_inspection_information,
            'description_inspection_information'  => request()->description_inspection_information,
        ];

        $this->mutationInspectionInformationValidator($form);

        $data = \TableMutationInspectionInformationModel::findOrFail(request()->uuid)->update($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function destroy(Request $request, $uuid)
    {
        \TableMutationInspectionInformationModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
