<?php

trait TableMutationInspectionInformationValidator
{

    public function mutationInspectionInformationValidator()
    {
        $form =  [
            'uuid'                                => 'TIF-' . uuid(),
            'uuid_tb_inspection'                  => request()->uuid_tb_inspection,
            'label_inspection_information'        => request()->label_inspection_information,
            'description_inspection_information'  => request()->description_inspection_information,
        ];

        $validator = \Validator::make($form, [
            'uuid'                                => 'required|string|digits:40|unique:tb_mutation_inspection_information',
            'uuid_tb_inspection'                  => 'required|string|digits:40',
            'label_inspection_information'        => 'required|in:cui,lui,com',
            'description_inspection_information'  => 'required|string',
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }
    }
}
