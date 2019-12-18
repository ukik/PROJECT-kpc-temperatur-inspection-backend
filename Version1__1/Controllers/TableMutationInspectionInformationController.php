<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionInformationController extends Controller
{
    use \TableMutationInspectionInformationValidator;
    // use \TableMutationInspectionInformationSchema;

    public function index(Request $request)
    {
        // $data = \TableMutationInspectionInformationModel::with([
        //     'trough_one_employee' => function ($query) {
        //         return $query->select(['uuid_tb_employee', 'name_employee']);
        //     },
        //     'trough_one_library_location' => function ($query) {
        //         return $query->select(['uuid_tb_location', 'name_location']);
        //     },
        //     'trough_one_library_equipment' => function ($query) {
        //         return $query->select(['uuid_tb_equipment', 'name_equipment']);
        //     },
        //     'belong_mutation_inspection' => function ($query) {
        //         return $query->select(['uuid', 'place_inspection']);
        //     }
        // ])
        // ->sortFilter()
        // ->filterPaginate();

        // return $sql = SqlWithBinding($data->toSql(), $data->getBindings());

        $data = \ViewMutationInspectionInformationModel::groupBy('uuid_tb_information')->filterPaginate();
        // $data = \ViewMutationInspectionModel::where('uuid_tb_inspection', request()->search_query_1)->groupBy('uuid_tb_information')->get();

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

        $validator = \Validator::make($form, [
            'uuid'                                => 'required|string|max:40|min:40',
            'uuid_tb_inspection'                  => 'required|string|max:40|min:40',
            'label_inspection_information'        => 'required|in:cui,lui,com',
            'description_inspection_information'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
        }

        $data = \ViewMutationInspectionModel::whereUuid(request()->uuid_tb_inspection);
        // return SqlWithBinding($data->toSql(), $data->getBindings());
        $data->first()->one_mutation_inspection->update(['valid_inspection' => "1"]);

        return resolver(
            $request = $request,
            $payload = $data->groupBy('uuid_tb_inspection')->first(),
            $auth = true,
            $model = 'mutation/inspection-information@update'
        );
    }

    public function destroy(Request $request, $uuid)
    {
        \TableMutationInspectionInformationModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
