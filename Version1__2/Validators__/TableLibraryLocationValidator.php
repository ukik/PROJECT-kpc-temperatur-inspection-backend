<?php

trait TableLibraryLocationValidator
{
    public function libraryLocationValidator()
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_location'    => request()->label_location, // harus lowercase
            'name_location'     => request()->name_location,
        ];

        $label = [];
        for ($i=0; $i <= 39; $i++) { 
            if($i < 10) {
                $label[$i] = "L0{$i}";
            } else {
                $label[$i] = "L{$i}";
            }
        }

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|max:40|min:40',
            'label_location'    => 'required|in:'.implode(',', $label),
            'name_location'     => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
        }
    }
}
