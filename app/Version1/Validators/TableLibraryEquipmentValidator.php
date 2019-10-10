<?php

trait TableLibraryEquipmentValidator
{
    public function libraryEquipmentValidator($form)
    {
        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|digits:40|unique:tb_library_equipment',
            'label_equipment'   => 'required|string|digits:3|unique:tb_library_equipment',
            'name_equipment'    => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            resolver([
                'fails'     => true,
                'messages'  => $validator->messages(),
            ]);
        }
    }
}
