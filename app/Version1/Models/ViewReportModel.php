<?php

use Illuminate\Database\Eloquent\Model;

class ViewReportModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \ViewReportFilter;

  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $table = "vw_report";

  protected $guarded = [
    'week',
    'year',
    'month',
    'month_name',
    'day',
    'day_name',
    'date',
    'time',
    'no',
    'uuid',
    'uuid_tb_employee',
    'uuid_tb_inspection',
    'uuid_tb_location',
    'uuid_tb_equipment',
    'place_inspection',
    'avg_condition_inspection',
    'avg_grease_shoot_inspection',
    'avg_weather_inspection',
    'avg_temperature_inspection',
    'avg_rain_inspection',
    'current_upnormal_inspection',
    'last_upnormal_inspection',
    'screenshoot_inspection',
    'created_at',
    'updated_at',
  ];

  public function belong_employee()
  {
    return $this->belongsTo(\TableEmployeeModel::class, 'uuid_tb_employee', 'uuid');
  }

  public function belong_employees()
  {
    return $this->belongsToMany(
      \TableEmployeeModel::class,      // target class 
      'tb_mutation_inspection',   // pivot table
      'uuid',                     // target primary key
      'uuid_tb_employee'          // pivot foreign key
    );
  }

  public function belong_library_equipment()
  {
    return $this->belongsTo(\TableLibraryEquipmentModel::class, 'uuid_tb_equipment', 'uuid');
  }

  public function belong_library_location()
  {
    return $this->belongsTo(\TableLibraryLocationModel::class, 'uuid_tb_location', 'uuid');
  }

  public function one_mutation_inspection_information()
  {
    return $this->hasOne(\TableMutationInspectionInformationModel::class, 'uuid_tb_inspection', 'uuid');
  }

  public function many_mutation_inspection()
  {
    return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_inspection');
  }
}
