<?php

trait TableLibraryEquipmentValidator
{
    public function libraryEquipmentValidator()
    {
        $form =  [
            'uuid'              => 'TLE-' . uuid(),
            'label_equipment'   => request()->label_equipment,
            'name_equipment'    => request()->name_equipment,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|digits:40|unique:tb_library_equipment',
            'label_equipment'   => 'required|string|digits:3|unique:tb_library_equipment',
            'name_equipment'    => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }
    }
}
