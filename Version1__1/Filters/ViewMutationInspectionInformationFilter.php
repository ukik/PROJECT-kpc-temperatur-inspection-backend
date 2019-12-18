<?php

trait ViewMutationInspectionInformationFilter
{

  protected $filter = [
    'uuid',
    'uuid_tb_employee',
    'uuid_tb_inspection',
    'uuid_tb_location',
    'uuid_tb_schedule',
    'uuid_tb_equipment',
    'place_inspection',
    'condition_inspection',
    'grease_shoot_inspection',
    'weather_inspection',
    'temperature_inspection',
    'rain_inspection',
    'current_upnormal_inspection',
    'last_upnormal_inspection',
    'screenshoot_inspection',
    'valid_inspection',
    'created_at',
    'updated_at',
    'uuid_tb_information',
    'label_inspection_information',
    'description_inspection_information',
    'name_employee',
    'label_equipment',
    'name_equipment',
    'label_location',
    'name_location',
  ];

  public static function initialize()
  {
    return [
      'uuid'                                => '',
      'uuid_tb_employee'                    => '',
      'uuid_tb_inspection'                  => '',
      'uuid_tb_location'                    => '',
      'uuid_tb_schedule'                    => '',
      'uuid_tb_equipment'                   => '',
      'place_inspection'                    => '',
      'condition_inspection'                => '',
      'grease_shoot_inspection'             => '',
      'weather_inspection'                  => '',
      'temperature_inspection'              => '',
      'rain_inspection'                     => '',
      'current_upnormal_inspection'         => '',
      'last_upnormal_inspection'            => '',
      'screenshoot_inspection'              => '',
      'valid_inspection'                    => '',
      'created_at'                          => '',
      'updated_at'                          => '',
      'uuid_tb_information'                    => '',
      'label_inspection_information'        => '',
      'description_inspection_information'  => '',
      'name_employee'                       => '',
      'label_equipment'                     => '',
      'name_equipment'                      => '',
      'label_location'                      => '',
      'name_location'                       => '',
    ];
  }
}
