<?php

use Illuminate\Database\Eloquent\Model;

class ViewReportModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateReportUtility;
  use \ViewReportFilter;
  // use \ViewReportCast;
  use \ViewReportSchema;

  public function __construct($attributes = [])
  {
      parent::__construct($attributes);

      // $this->table = 'tb_mutation_inspection';
      date_default_timezone_set('Asia/Makassar');

      $year = request()->year;
      $month = request()->month;

      if(!$year && !$month) {

          $year = date('Y');
          $month = date('m');

          if (!ifTableExist("vw_report_{$year}_{$month}")) {
              // fresh create berdasarkan current Date
              if($year <= date('Y') && $month <= date('m')){
                $this->createDynamicView("tb_mutation_inspection_{$year}_{$month}", "vw_report_{$year}_{$month}");
              }
          } 
          
          $this->table = "vw_report_{$year}_{$month}";
          return;
      }

      $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

      $validator = \Validator::make([
          'year'      => $year,
          'month'     => $month,
      ], [
          "year"    => 'required|numeric|digits_between:4,4', 
          "month"   => 'required|digits_between:2,2|in:'.$month_validation, 
      ]);

      if ($validator->fails()) {
          dd($validator->messages());
      }    

      if (!ifTableExist("vw_report_{$year}_{$month}")) {
        // batas terakhir adalah current Date
        if($year <= date('Y') && $month <= date('m')){
          $this->createDynamicView("tb_mutation_inspection_{$year}_{$month}", "vw_report_{$year}_{$month}");
        }            
      } 

      $this->table = "vw_report_{$year}_{$month}";
      return;
  }


  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $casts = [
    'place_inspection'  => 'string'
  ];

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
      \TableEmployeeModel::class,     // target class 
      'tb_mutation_inspection',       // pivot table
      'uuid',                         // target primary key
      'uuid_tb_employee'              // pivot foreign key
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
