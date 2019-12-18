<?php

trait TableLibraryLocationFilter
{
  protected $filter = [
    'no',
    'uuid',
    'label_location',
    'name_location',
    'created_at',
    'updated_at',
  ];

  public static function initialize()
  {
    return [
      'no'                => '',
      'uuid'              => '',
      'label_location'    => '',
      'name_location'     => '',
      'created_at'        => '',
      'updated_at'        => '',
    ];
  }
}
