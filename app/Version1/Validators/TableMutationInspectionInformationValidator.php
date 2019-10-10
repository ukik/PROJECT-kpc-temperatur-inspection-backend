<?php

trait TableMutationInspectionInformationValidator
{
    public function mutationInspectionInformationValidator($form)
    {
        $validator = \Validator::make($form, [
            'uuid'                                => 'required|string|digits:40|unique:tb_mutation_inspection_information',
            'uuid_tb_inspection'                  => 'required|string|digits:40',
            'label_inspection_information'        => 'required|in:cui,lui,com',
            'description_inspection_information'  => 'required|string',
        ]);

        if ($validator->fails()) {
            resolver([
                'fails'     => true,
                'messages'  => $validator->messages(),
            ]);
        }
    }
}
