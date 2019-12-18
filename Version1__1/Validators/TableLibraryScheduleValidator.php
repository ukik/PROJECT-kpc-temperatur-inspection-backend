<?php

trait TableLibraryScheduleValidator
{
    public function libraryScheduleValidator()
    {
        $form =  [
            'uuid'                  => 'TLS-' . uuid(),
            'label_schedule'        => request()->label_schedule,
            'starttime_schedule'    => request()->starttime_schedule,
            'endtime_schedule'      => request()->endtime_schedule,
        ];

        $validator = \Validator::make($form, [
            'uuid'                  => 'required|string|digits:40|unique:tb_library_schedule',
            'label_schedule'        => 'required|string|digits:3|unique:tb_library_schedule',
            'starttime_schedule'    => 'required',
            'endtime_schedule'      => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }
    }
}
