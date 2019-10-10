<?php

trait TableMutationInspectionValidator
{
    public function mutationInspectionValidator($form)
    {
        $validator = \Validator::make($form, [
            'uuid'                          => 'required|string|digits:40|unique:tb_mutation_inspection',
            'uuid_tb_employee'              => 'required|string|digits:40',
            // 'uuid_tb_inspection'            => 'required|string|digits:40', // self-relationship
            'uuid_tb_equipment'             => 'required|string|digits:40',
            'uuid_tb_location'              => 'required|string|digits:40',
            // 'equipment_inspection'          => 'required|string|digits:3',
            // 'location_inspection'           => 'required|string|digits:3',
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
            resolver([
                'fails'     => true,
                'messages'  => $validator->messages(),
            ]);
        }
    }
}
