<?php

trait TableMutationInspectionInformationFilter
{
  protected $filter = [
    'uuid',
    'uuid_tb_inspection',
    'label_inspection_information',
    'description_inspection_information',
    'created_at',
    'updated_at',

    'belong_mutation_inspection.uuid',
    'belong_mutation_inspection.uuid_tb_employee',
    'belong_mutation_inspection.uuid_tb_inspection',
    'belong_mutation_inspection.uuid_tb_employee',
    'belong_mutation_inspection.uuid_tb_location',
    // 'belong_mutation_inspection.equipment_inspection',
    // 'belong_mutation_inspection.location_inspection',
    'belong_mutation_inspection.place_inspection',
    'belong_mutation_inspection.condition_inspection',
    'belong_mutation_inspection.grease_shoot_inspection',
    'belong_mutation_inspection.weather_inspection',
    'belong_mutation_inspection.temperature_inspection',
    'belong_mutation_inspection.rain_inspection',
    'belong_mutation_inspection.current_upnormal_inspection',
    'belong_mutation_inspection.last_upnormal_inspection',
    'belong_mutation_inspection.screenshoot_inspection',
    'belong_mutation_inspection.created_at',
    'belong_mutation_inspection.updated_at',

    'belong_library_equipment.uuid',
    'belong_library_equipment.label_equipment',
    'belong_library_equipment.name_equipment',
    'belong_library_equipment.created_at',
    'belong_library_equipment.updated_at',

    'belong_library_location.uuid',
    'belong_library_location.label_location',
    'belong_library_location.name_location',
    'belong_library_location.created_at',
    'belong_library_location.updated_at',

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
  ];

  public static function initialize()
  {
    return [
      'uuid'                                => '',
      'uuid_tb_inspection'                  => '',
      'label_inspection_information'        => '',
      'description_inspection_information'  => '',
      'created_at'                          => '',
      'updated_at'                          => '',
    ];
  }
}
