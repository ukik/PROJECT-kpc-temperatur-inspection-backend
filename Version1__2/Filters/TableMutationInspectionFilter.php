<?php

trait TableMutationInspectionFilter
{

  protected $filter = [
    'uuid',
    'uuid_belong_employee',
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
    'current_upnormal_description_inspection',
    'last_upnormal_inspection',
    'last_upnormal_description_inspection',
    'common_description_inspection',
    'screenshoot_inspection',
    'valid_inspection',
    'created_at',
    'updated_at',

    'belong_employee.uuid',
    'belong_employee.name_employee',
    'belong_employee.position_employee',
    'belong_employee.nik_employee',
    'belong_employee.telpon_employee',
    'belong_employee.email_employee',
    'belong_employee.birth_place_employee',
    'belong_employee.birth_date_employee',
    'belong_employee.gender_employee',
    'belong_employee.marital_employee',
    'belong_employee.address_employee',
    'belong_employee.password_employee',
    'belong_employee.plain_password_employee',
    'belong_employee.photo_employee',
    'belong_employee.verification_employee',
    'belong_employee.disable_employee',
    'belong_employee.created_at',
    'belong_employee.updated_at',

    'belong_employees.uuid',
    'belong_employees.name_employee',
    'belong_employees.position_employee',
    'belong_employees.nik_employee',
    'belong_employees.telpon_employee',
    'belong_employees.email_employee',
    'belong_employees.birth_place_employee',
    'belong_employees.birth_date_employee',
    'belong_employees.gender_employee',
    'belong_employees.marital_employee',
    'belong_employees.address_employee',
    'belong_employees.password_employee',
    'belong_employees.plain_password_employee',
    'belong_employees.photo_employee',
    'belong_employees.verification_employee',
    'belong_employees.disable_employee',
    'belong_employees.created_at',
    'belong_employees.updated_at',

    'belong_library_location.uuid',
    'belong_library_location.label_location',
    'belong_library_location.name_location',
    'belong_library_location.created_at',
    'belong_library_location.updated_at',

    'belong_library_equipment.uuid',
    'belong_library_equipment.label_equipment',
    'belong_library_equipment.name_equipment',
    'belong_library_equipment.created_at',
    'belong_library_equipment.updated_at',

    'belong_library_schedule.uuid',
    'belong_library_schedule.label_schedule',
    'belong_library_schedule.starttime_schedule',
    'belong_library_schedule.endtime_schedule',
    'belong_library_schedule.created_at',
    'belong_library_schedule.updated_at',
  ];

  public static function initialize()
  {
    return [
      'uuid'                          => '',
      'uuid_id_employee'              => '',
      'uuid_tb_schedule'              => '',
      'uuid_tb_location'              => '',
      'uuid_tb_equipment'             => '',
      'place_inspection'              => '',
      'condition_inspection'          => '',
      'grease_shoot_inspection'       => '',
      'weather_inspection'            => '',
      'temperature_inspection'        => '',
      'rain_inspection'               => '',

      'current_upnormal_inspection'             => '',
      'current_upnormal_description_inspection' => '',
      'last_upnormal_inspection'                => '',
      'last_upnormal_description_inspection'    => '',
      'common_description_inspection'           => '',

      'screenshoot_inspection'        => '',
      'valid_inspection'              => '',
      'created_at'                    => '',
      'updated_at'                    => '',
    ];
  }
}