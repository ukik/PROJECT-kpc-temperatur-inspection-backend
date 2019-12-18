<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// CLUSTER
// CONSIST PARENT - CHILD TABLE

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionFilter;
  use \TableMutationInspectionSchema;
  use \TableMutationInspectionAttribute;

  public $table_session = "";
  public $table_suffix = "";

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);

    date_default_timezone_set('Asia/Makassar');

    $year = request()->year;
    $month = request()->month;
    $minYear = 2017;

    if ($year < $minYear || $year > date('Y')) {

      if (!ifTableExist("tb_mutation_inspection")) {
        $this->createStaticTableMutationInspectionSchema("tb_mutation_inspection");
      }

      $this->table = "tb_mutation_inspection";
      $this->table_session = "tb_mutation_inspection";
      $this->table_suffix = "";

      return;
    }

    if (!$year && !$month) {

      $year = date('Y');
      $month = date('m');

      // fresh create berdasarkan current Date
      if ($year <= date('Y') && $month <= date('m')) {

        if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
        }
      }

      $this->table = "tb_mutation_inspection_{$year}_{$month}";
      $this->table_session = "tb_mutation_inspection_{$year}_{$month}";
      $this->table_suffix = "_{$year}_{$month}";

      return;
    }

    $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

    $validator = \Validator::make([
      'year'      => $year,
      'month'     => $month,
    ], [
      "year"    => 'required|numeric|digits_between:4,4',
      "month"   => 'required|digits_between:2,2|in:' . $month_validation,
    ]);

    if ($validator->fails()) {
      dd($validator->messages());
    }

    // batas terakhir adalah current Date
    if ($year <= date('Y') && $month <= date('m') && $year >= $minYear) {

      if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
        $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
      }
    }

    $this->table = "tb_mutation_inspection_{$year}_{$month}";
    $this->table_session = "tb_mutation_inspection_{$year}_{$month}";
    $this->table_suffix = "_{$year}_{$month}";

    return;
  }

  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $fillable = [
    'uuid',
    'uuid_tb_employee',
    'uuid_tb_inspection',
    'uuid_tb_equipment',
    'uuid_tb_schedule',
    'uuid_tb_location',
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
  ];


  public function belong_employee()
  {
    return $this->belongsTo(\TableEmployeeModel::class, 'uuid_tb_employee', 'uuid');
  }

  public function belong_employees()
  {
    return $this->belongsToMany(
      \TableEmployeeModel::class,     // target class 
      "tb_mutation_inspection{$this->table_suffix}",       // pivot table
      'uuid',                         // target primary key
      'uuid_tb_employee'              // pivot foreign key
    );
  }

  public function belong_library_equipment()
  {
    return $this->belongsTo(\TableLibraryEquipmentModel::class, 'uuid_tb_equipment', 'uuid');
    // return $this->belongsTo(
    //   \LibraryEquipmentModel::class,
    //   'equipment_inspection',
    //   'label_equipment'
    // );
  }

  public function belong_library_location()
  {
    return $this->belongsTo(\TableLibraryLocationModel::class, 'uuid_tb_location', 'uuid');
    // return $this->belongsTo(\LibraryLocationModel::class, 'location_inspection', 'label_location');
  }

  public function belong_library_schedule()
  {
    return $this->belongsTo(\TableLibraryScheduleModel::class, 'uuid_tb_schedule', 'uuid');
  }

  public function many_mutation_inspection_information()
  {
    return $this->hasMany(\TableMutationInspectionInformationModel::class, 'uuid_tb_inspection', 'uuid');
  }

  public function many_mutation_inspection()
  {
    return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_inspection');
  }
}
