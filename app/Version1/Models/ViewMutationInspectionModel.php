<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// CLUSTER

use Illuminate\Database\Eloquent\Model;

class ViewMutationInspectionModel extends Model
{
  use \FilterPaginateUtility;
  use \ViewMutationInspectionFilter;
  use \TableMutationInspectionSchema;
  use \ViewMutationInspectionSchema;

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

      // origin
      if (!ifTableExist("tb_mutation_inspection")) {
        $this->createStaticTableMutationInspectionSchema("tb_mutation_inspection");
      }

      // mirror
      if (!ifViewExist("vw_mutation_inspection")) {
        $this->createStaticViewMutationInspectionSchema("vw_mutation_inspection");
      }

      $this->table = "vw_mutation_inspection";
      $this->table_session = "vw_mutation_inspection";
      $this->table_suffix = "";

      return;
    }

    if (!$year && !$month) {

      $year = date('Y');
      $month = date('m');

      if ($year <= date('Y') && $month <= date('m')) {

        // origin
        if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
        }

        // mirror
        if (!ifViewExist("vw_mutation_inspection_{$year}_{$month}")) {
          $this->createDynamicViewMutationInspectionSchema("vw_mutation_inspection_{$year}_{$month}", "_{$year}_{$month}");
        }
      }

      $this->table = "vw_mutation_inspection_{$year}_{$month}";
      $this->table_session = "vw_mutation_inspection_{$year}_{$month}";
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
      return Resolver([
        'payload'   => $validator->messages(),
        'status'    => "validation"
      ]);
      // dd($validator->messages());
    }

    if ($year <= date('Y') && $month <= date('m') && $year >= $minYear) {

      // origin
      if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
        $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
      }

      // mirror
      if (!ifViewExist("vw_mutation_inspection_{$year}_{$month}")) {
        $this->createDynamicViewMutationInspectionSchema("vw_mutation_inspection_{$year}_{$month}", "_{$year}_{$month}");
      }
    }

    $this->table = "vw_mutation_inspection_{$year}_{$month}";
    $this->table_session = "vw_mutation_inspection_{$year}_{$month}";
    $this->table_suffix = "_{$year}_{$month}";

    return;
  }

  protected $casts = [
    'place_inspection'  => 'string'
  ];

  protected $guarded = [
    'uuid',
    'uuid_tb_employee',
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
    'name_employee',
    'label_equipment',
    'name_equipment',
    'label_location',
    'name_location',
  ];
  
    public function tb_mutation_inspection()
    {
        return $this->hasOne(\TableMutationInspectionModel::class, 'uuid', 'uuid');
    }  
}
