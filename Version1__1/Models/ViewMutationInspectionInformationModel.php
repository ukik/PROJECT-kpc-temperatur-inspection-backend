<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// CLUSTER

use Illuminate\Database\Eloquent\Model;

class ViewMutationInspectionInformationModel extends Model
{
  use \FilterPaginateUtility;
  // use \FilterPaginateReportUtility;

  use \ViewMutationInspectionInformationFilter;

  use \TableMutationInspectionSchema;
  use \TableMutationInspectionInformationSchema;

  use \ViewMutationInspectionSchema;
  use \ViewMutationInspectionInformationSchema;


  public $table_session = "";
  public $table_suffix = "";

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);

    // $this->table = 'tb_mutation_inspection';
    date_default_timezone_set('Asia/Makassar');

    $year = request()->year;
    $month = request()->month;
    $minYear = 2017;

    if ($year < $minYear || $year > date('Y')) {

      // origin
      if (!ifTableExist("tb_mutation_inspection")) {
        $this->createStaticTableMutationInspectionSchema("tb_mutation_inspection");
      }
      if (!ifTableExist("tb_mutation_inspection_information")) {
        $this->createStaticTableMutationInspectionInformationSchema("tb_mutation_inspection_information");
      }

      // mirror
      if (!ifViewExist("vw_mutation_inspection_information")) {
        $this->createStaticViewMutationInspectionInformationSchema("vw_mutation_inspection_information");
      }

      $this->table = "vw_mutation_inspection_information";
      $this->table_session = "vw_mutation_inspection_information";
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
        if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
          $this->createDynamicTableMutationInspectionInformationSchema("tb_mutation_inspection_information_{$year}_{$month}", "tb_mutation_inspection_{$year}_{$month}");
        }

        // mirror
        if (!ifViewExist("vw_mutation_inspection_information_{$year}_{$month}")) {
          $this->createDynamicViewMutationInspectionInformationSchema("vw_mutation_inspection_information_{$year}_{$month}", "_{$year}_{$month}");
        }
      }

      $this->table = "vw_mutation_inspection_information_{$year}_{$month}";
      $this->table_session = "vw_mutation_inspection_information_{$year}_{$month}";
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

    if ($year <= date('Y') && $month <= date('m') && $year >= $minYear) {

      // origin
      if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
        $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
      }
      if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
        $this->createDynamicTableMutationInspectionInformationSchema("tb_mutation_inspection_information_{$year}_{$month}", "tb_mutation_inspection_{$year}_{$month}");
      }

      // mirror
      if (!ifViewExist("vw_mutation_inspection_information_{$year}_{$month}")) {
        $this->createDynamicViewMutationInspectionInformationSchema("vw_mutation_inspection_information_{$year}_{$month}", "_{$year}_{$month}");
      }
    }

    $this->table = "vw_mutation_inspection_information_{$year}_{$month}";
    $this->table_session = "vw_mutation_inspection_information_{$year}_{$month}";
    $this->table_suffix = "_{$year}_{$month}";

    return;
  }


  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $casts = [
    'place_inspection'  => 'string'
  ];

  protected $guarded = [
    'uuid',
    'uuid_tb_employee',
    'uuid_tb_inspection',
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
    'last_upnormal_inspection',
    'screenshoot_inspection',
    'valid_inspection',
    'created_at',
    'updated_at',
    'uuid_tb_information',
    'label_inspection_information',
    'description_inspection_information',
    'name_employee',
    'label_equipment',
    'name_equipment',
    'label_location',
    'name_location',
  ];

  public function one_mutation_inspection()
  {
    // return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_inspection');
    return $this->hasOne(\TableMutationInspectionModel::class, 'uuid', 'uuid');
  }
}
