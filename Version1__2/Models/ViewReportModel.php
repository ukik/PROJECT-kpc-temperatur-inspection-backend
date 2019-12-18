<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// CLUSTER

use Illuminate\Database\Eloquent\Model;

class ViewReportModel extends Model
{
  use \ViewReportFilter;
  use \ViewReportSchema;
  use \TableMutationInspectionSchema;

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
    $minYear = self::$minYear;

    if ($year < $minYear || $year > date('Y')) {

      // origin
      if (!ifTableExist("tb_mutation_inspection")) {
        $this->createStaticTableMutationInspectionSchema("tb_mutation_inspection");
      }

      // mirror
      if (!ifViewExist("vw_report")) {
        $this->createStaticViewReportSchema("vw_report");
      }

      $this->table = "vw_report";
      $this->table_session = "vw_report";
      $this->table_suffix = "";

      return;
    }

    switch (request()->search_column) {
      case 'quartal':
        $this->getQuartal();
        return;
      case 'month':
        $this->getMonth();
        return;
      case 'week':
        $this->getWeek();
        // dicari week dalam angka itu dibulan berapa?
        return;
    }
  }

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
    'uuid',
    'uuid_tb_employee',
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

  public function tb_library_equipment()
  {
    return $this->belongsTo(\TableLibraryEquipmentModel::class, 'uuid_tb_equipment', 'uuid');
  }

  public function tb_library_location()
  {
    return $this->belongsTo(\TableLibraryLocationModel::class, 'uuid_tb_location', 'uuid');
  }

  public function getQuartal()
  {

    date_default_timezone_set('Asia/Makassar');

    $year = request()->year;
    $minYear = self::$minYear;
    $search_interval = request()->search_interval;

    $validator = \Validator::make([
      'year'                => $year,
      'search_interval'     => $search_interval,
    ], [
      "year"                => 'required|numeric|digits_between:4,4',
      "search_interval"     => 'required|in:1,2,3,4',
    ]);

    if ($validator->fails()) {
      return Resolver([
        'payload'   => $validator->messages(),
        'status'    => "validation"
      ]);
      // dd($validator->messages());
    }

    // batas terakhir adalah current Date        
    if ($year <= date('Y') && $year >= $minYear) {
      $this->checkQuartal($year);
    }

    $this->table = "vw_report_quartal_0{$search_interval}";
    $this->table_session = "vw_report_quartal_0{$search_interval}";
    $this->table_suffix = "_0{$search_interval}";

    return;
  }

  public function checkQuartal($year)
  {
    switch (request()->search_interval) {
      case 1:
        // origin
        if (!ifTableExist("tb_mutation_inspection_{$year}_01")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_01");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_02")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_02");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_03")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_03");
        }

        // mirror
        if (!ifViewExist("vw_report_{$year}_01")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_01", "_{$year}_01");
        }
        if (!ifViewExist("vw_report_{$year}_02")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_02", "_{$year}_02");
        }
        if (!ifViewExist("vw_report_{$year}_03")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_03", "_{$year}_03");
        }

        if (!ifViewExist("vw_report_quartal_01")) {
          $this->createStaticViewReportQuartalSchema("vw_report_quartal_01", ["_{$year}_01", "_{$year}_02", "_{$year}_03"]);
        }

        break;

      case 2:
        // origin
        if (!ifTableExist("tb_mutation_inspection_{$year}_04")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_04");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_05")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_05");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_06")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_06");
        }

        // mirror
        if (!ifViewExist("vw_report_{$year}_04")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_04", "_{$year}_04");
        }
        if (!ifViewExist("vw_report_{$year}_05")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_05", "_{$year}_05");
        }
        if (!ifViewExist("vw_report_{$year}_06")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_06", "_{$year}_06");
        }

        if (!ifViewExist("vw_report_quartal_02")) {
          $this->createStaticViewReportQuartalSchema("vw_report_quartal_02", ["_{$year}_04", "_{$year}_05", "_{$year}_06"]);
        }

        break;

      case 3:
        // origin
        if (!ifTableExist("tb_mutation_inspection_{$year}_07")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_07");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_08")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_08");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_09")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_09");
        }

        // mirror
        if (!ifViewExist("vw_report_{$year}_07")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_07", "_{$year}_07");
        }
        if (!ifViewExist("vw_report_{$year}_08")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_08", "_{$year}_08");
        }
        if (!ifViewExist("vw_report_{$year}_09")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_09", "_{$year}_09");
        }

        if (!ifViewExist("vw_report_quartal_03")) {
          $this->createStaticViewReportQuartalSchema("vw_report_quartal_03", ["_{$year}_07", "_{$year}_08", "_{$year}_09"]);
        }

        break;

      case 4:
        // origin
        if (!ifTableExist("tb_mutation_inspection_{$year}_10")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_10");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_11")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_11");
        }
        if (!ifTableExist("tb_mutation_inspection_{$year}_12")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_12");
        }

        // mirror
        if (!ifViewExist("vw_report_{$year}_10")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_10", "_{$year}_10");
        }
        if (!ifViewExist("vw_report_{$year}_11")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_11", "_{$year}_11");
        }
        if (!ifViewExist("vw_report_{$year}_12")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_12", "_{$year}_12");
        }

        if (!ifViewExist("vw_report_quartal_04")) {
          $this->createStaticViewReportQuartalSchema("vw_report_quartal_04", ["_{$year}_10", "_{$year}_11", "_{$year}_12"]);
        }

        break;
    }
  }

  private function num_weeks_in_year($year)
  {
    $weeks = ["0"];
    $daySum = 0;
    for ($x = 1; $x <= 12; $x++) {
      $daySum += cal_days_in_month(CAL_GREGORIAN, $x, $year);
    }
    for ($i = 1; $i <= round($daySum / 7); $i++) {
      $weeks[$i] = $i;
    }
    return implode(",", $weeks);
  }

  public function getWeek()
  {

    date_default_timezone_set('Asia/Makassar');

    $year = request()->year;
    $search_interval = request()->search_interval;
    $minYear = self::$minYear;

    $week_month_start = date("m", strtotime(sprintf("%4dW%02d", $year, $search_interval)));
    $week_month_end = date("m", strtotime(sprintf("%4dW%02d", $year, $search_interval + 1)));

    $validator = \Validator::make([
      'year'                => $year,
      'search_interval'     => $search_interval,
    ], [
      "year"              => 'required|numeric|digits_between:4,4',
      "search_interval"   => 'required|in:' . $this->num_weeks_in_year($year),
    ]);

    if ($validator->fails()) {
      return Resolver([
        'payload'   => $validator->messages(),
        'status'    => "validation"
      ]);
    }

    // batas terakhir adalah current Date        
    if ($year <= date('Y') && $year >= $minYear) {

      // origin
      if (!ifTableExist("tb_mutation_inspection_{$year}_{$week_month_start}")) {
        $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$week_month_start}");
      }

      // mirror
      if (!ifViewExist("vw_report_{$year}_{$week_month_start}")) {
        $this->createDynamicViewReportSchema("vw_report_{$year}_{$week_month_start}", "_{$year}_{$week_month_start}");
      }

      setter("table_week", "vw_report_{$year}_{$week_month_start}");

      // jika di minggu tertentu ada 2 bulan
      // misal minggu ke 5 dimulai bulan januari 28 berakhir di bulan februari 3    
      // maka disebut overlap_week
      if ($week_month_end != $week_month_start) {

        // origin
        if (!ifTableExist("tb_mutation_inspection_{$year}_{$week_month_end}")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$week_month_end}");
        }

        // mirror
        if (!ifViewExist("vw_report_{$year}_{$week_month_end}")) {
          $this->createDynamicViewReportSchema("vw_report_{$year}_{$week_month_end}", "_{$year}_{$week_month_end}");
        }

        setter("table_week_overlap", "vw_report_{$year}_{$week_month_end}");
      }
    }

    $this->table = "vw_report_{$year}_{$week_month_start}";
    $this->table_session = "vw_report_{$year}_{$week_month_start}";
    $this->table_suffix = "_{$year}_{$week_month_start}";
  }


  public function getMonth()
  {

    date_default_timezone_set('Asia/Makassar');

    $year = request()->year;
    $month = request()->search_interval;
    $minYear = self::$minYear;

    $month_validation = "01,02,03,04,05,06,07,08,09,10,11,12";

    $validator = \Validator::make([
      'year'      => $year,
      'month'     => $month,
    ], [
      "year"    => 'required|numeric|digits_between:4,4',
      "month"   => 'required|in:' . $month_validation,
    ]);

    if ($validator->fails()) {
      return Resolver([
        'payload'   => $validator->messages(),
        'status'    => "validation"
      ]);
    }

    // batas terakhir adalah current Date        
    if ($year <= date('Y') && $year >= $minYear) {

      // origin
      if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
        $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
      }

      // mirror
      if (!ifViewExist("vw_report_{$year}_{$month}")) {
        $this->createDynamicViewReportSchema("vw_report_{$year}_{$month}", "_{$year}_{$month}");
      }
    }

    $this->table = "vw_report_{$year}_{$month}";
    $this->table_session = "vw_report_{$year}_{$month}";
    $this->table_suffix = "_{$year}_{$month}";

    return;
  }
}
