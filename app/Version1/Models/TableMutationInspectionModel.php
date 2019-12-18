<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// CLUSTER
// CONSIST PARENT - CHILD TABLE

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TableMutationInspectionModel extends Model
{
	use Notifiable;
	
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionFilter;
  use \TableMutationInspectionSchema;
  use \TableMutationInspectionAttribute;

  public $table_session = "";
  public $table_suffix = "";

  public $incrementing = false;
  protected $primaryKey = 'uuid';

  public static $minYear = 2017;

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);

    date_default_timezone_set('Asia/Makassar');

    $year = request()->year;
    $month = request()->month;
    $minYear = self::$minYear;

    if ($year < $minYear || $year > date('Y')) {

      if (!ifTableExist("tb_mutation_inspection")) {
        $this->createStaticTableMutationInspectionSchema("tb_mutation_inspection");
      }

      $this->table = "tb_mutation_inspection";
      $this->table_session = "tb_mutation_inspection";
      $this->table_suffix = "";
	  
	  setter('table', $this->table);

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

	  setter('table', $this->table);

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
      return Resolver([
        'payload'   => $validator->messages(),
        'status'    => "validation"
      ]);
      // dd($validator->messages());
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

	setter('table', $this->table);

    return;
  }

  protected $fillable = [
    'uuid',
    'uuid_tb_employee',
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

  public function tb_employee()
  {
    return $this->belongsTo(\TableEmployeeModel::class, 'uuid_tb_employee', 'uuid');
  }

  public function tb_employees()
  {
    return $this->belongsToMany(
      \TableEmployeeModel::class,     // target class 
      "tb_mutation_inspection{$this->table_suffix}",       // pivot table
      'uuid',                         // target primary key
      'uuid_tb_employee'              // pivot foreign key
    );
  }

	public function tb_mutation_inspection()
	{
		return $this->hasOne(\ViewMutationInspectionModel::class, 'uuid', 'uuid');
		//return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_employee');
	}

  public function tb_library_equipment()
  {
    return $this->belongsTo(\TableLibraryEquipmentModel::class, 'uuid_tb_equipment', 'uuid');
  }

  public function tb_library_location()
  {
    return $this->belongsTo(\TableLibraryLocationModel::class, 'uuid_tb_location', 'uuid');
  }

  public function tb_library_schedule()
  {
    return $this->belongsTo(\TableLibraryScheduleModel::class, 'uuid_tb_schedule', 'uuid');
  }
}
