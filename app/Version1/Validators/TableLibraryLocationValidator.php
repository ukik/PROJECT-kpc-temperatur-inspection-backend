<?php

trait TableLibraryLocationValidator
{
    public function libraryLocationValidator()
    {
        $form =  [
            'uuid'              => 'TLE-' . uuid(),
            'label_location'    => request()->label_location,
            'name_location'     => request()->name_location,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|digits:40|unique:tb_library_location',
            'label_location'    => 'required|string|digits:3|unique:tb_library_location',
            'name_location'     => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }
    }
}
