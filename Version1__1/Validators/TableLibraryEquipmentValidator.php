<?php

trait TableLibraryEquipmentValidator
{
    public function libraryEquipmentValidator()
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_equipment'   => request()->label_equipment, // harus lowercase
            'name_equipment'    => request()->name_equipment,
        ];

        $label = [];
        for ($i=0; $i <= 10; $i++) { 
            if($i < 10) {
                $label[$i] = "E0{$i}";
            } else {
                $label[$i] = "E{$i}";
            }
        }

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|max:40|min:40',
            'label_equipment'   => 'required|in:'.implode(',', $label),
            'name_equipment'    => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
        }
    }
}
