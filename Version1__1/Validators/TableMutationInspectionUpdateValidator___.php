<?php

trait TableMutationInspectionUpdateValidator___
{

    public function mutationInspectionUpdateValidator()
    {
        $form =  [
            'uuid'                          => 'TIS-' . uuid(),
            'uuid_tb_employee'              => request()->uuid_tb_employee,
            'uuid_tb_inspection'            => !request()->uuid_tb_inspection ?: NULL,
            'uuid_tb_schedule'              => request()->uuid_tb_schedule,
            'uuid_tb_location'              => request()->uuid_tb_location,
            'uuid_tb_equipment'             => request()->uuid_tb_equipment,
            'equipment_inspection'          => request()->equipment_inspection,
            'location_inspection'           => request()->location_inspection,
            'place_inspection'              => request()->place_inspection,
            'condition_inspection'          => request()->condition_inspection,
            'grease_shoot_inspection'       => request()->grease_shoot_inspection,
            'weather_inspection'            => request()->weather_inspection,
            'temperature_inspection'        => request()->temperature_inspection,
            'rain_inspection'               => request()->rain_inspection,
            'current_upnormal_inspection'   => request()->current_upnormal_inspection,
            'last_upnormal_inspection'      => request()->last_upnormal_inspection,
            'screenshoot_inspection'        => request()->screenshoot_inspection,
        ];

        $validator = \Validator::make($form, [
            'uuid'                          => 'required|string|digits:40|unique:tb_mutation_inspection',
            'uuid_tb_employee'              => 'required|string|digits:40',
            'uuid_tb_schedule'              => 'required|string|digits:40',
            'uuid_tb_location'              => 'required|string|digits:40',
            'uuid_tb_equipment'             => 'required|string|digits:40',
            // 'uuid_tb_inspection'            => 'required|string|digits:40', // self-relationship
            'place_inspection'              => 'required|in:0,1,2',
            'condition_inspection'          => 'required|in:0,1,2',
            'grease_shoot_inspection'       => 'required|numeric|digits:3',
            'weather_inspection'            => 'required|in:0,1,2,3,4,5',
            'temperature_inspection'        => 'required|numeric|regex:/^\d+(\.\d{3,2})?$/',
            'rain_inspection'               => 'required|numeric|regex:/^\d+(\.\d{3,2})?$/',
            'current_upnormal_inspection'   => 'required|in:0,1',
            'last_upnormal_inspection'      => 'required|in:0,1',
            'screenshoot_inspection'        => 'imageable',
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }
    }
}
