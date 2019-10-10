<?php

trait TableLibraryEquipmentFilter
{
  protected $filter = [
    'no',
    'uuid',
    'label_equipment',
    'name_equipment',
    'created_at',
    'updated_at',
  ];

  public static function initialize()
  {
    return [
      'no'                => '',
      'uuid'              => '',
      'label_equipment'   => '',
      'name_equipment'    => '',
      'created_at'        => '',
      'updated_at'        => '',
    ];
  }
}
