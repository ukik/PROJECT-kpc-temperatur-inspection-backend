<?php

trait TableLibraryScheduleFilter
{
  protected $filter = [
    'no',
    'uuid',
    'label_schedule',
    'starttime_schedule',
    'endtime_schedule',
    'created_at',
    'updated_at',
  ];

  public static function initialize()
  {
    return [
      'no'              => '',
      'uuid'            => '',
      'label_schedule'  => '',
      'time_schedule'   => '',
      'endtime_schedule'=> '',
      'created_at'      => '',
      'updated_at'      => '',
    ];
  }
}
