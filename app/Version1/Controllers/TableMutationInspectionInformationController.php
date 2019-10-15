<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionInformationController extends Controller
{
    use \TableMutationInspectionInformationValidator;
    use \TableMutationInspectionInformationSchema;

    public function index(Request $request)
    {
        // validate params + create session table name
        // paramMonthYearValidator();

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
        ])
        ->sortFilter()
        ->filterPaginate();

        return resolver(
            $request = $request, 
            $payload = $data, 
            $auth = true
        );
    }

    public function store(Request $request)
    {
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
