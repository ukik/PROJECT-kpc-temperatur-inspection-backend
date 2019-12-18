<?php

// DEPENDENT TABLE TO 'tb_mutation_inspection'
// RUNTIME DEFINITION TABLE
// CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionInformationModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionInformationFilter;
  use \TableMutationInspectionInformationSchema;

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

      // parent
      if (!ifTableExist("tb_mutation_inspection")) {
        $this->createStaticTableMutationInspectionSchema("tb_mutation_inspection");
      }

      // child
      if (!ifTableExist("tb_mutation_inspection_information")) {
        $this->createStaticTableMutationInspectionInformationSchema("tb_mutation_inspection_information");
      }

      $this->table = "tb_mutation_inspection_information";
      $this->table_session = "tb_mutation_inspection_information";
      $this->table_suffix = "";

      return;
    }

    if (!$year && !$month) {

      $year = date('Y');
      $month = date('m');

      if ($year <= date('Y') && $month <= date('m')) {
        // parent
        if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
          $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
        }

        if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
          // fresh create berdasarkan current Date
          $this->createDynamicTableMutationInspectionInformationSchema("tb_mutation_inspection_information_{$year}_{$month}");
        }
      }

      $this->table = "tb_mutation_inspection_information_{$year}_{$month}";
      $this->table_session = "tb_mutation_inspection_information_{$year}_{$month}";
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
      // parent
      if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
        $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
      }

      if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
        // fresh create berdasarkan current Date
        $this->createDynamicTableMutationInspectionInformationSchema("tb_mutation_inspection_information_{$year}_{$month}");
      }
    }

    $this->table = "tb_mutation_inspection_information_{$year}_{$month}";
    $this->table_session = "tb_mutation_inspection_information_{$year}_{$month}";
    $this->table_suffix = "_{$year}_{$month}";
    return;
  }

  public $incrementing = false;

  protected $primaryKey = 'uuid_tb_inspection';

  protected $fillable = [
    'uuid',
    'uuid_tb_inspection',
    'label_inspection_information',
    'description_inspection_information',
    'created_at',
    'updated_at',
  ];

  public function belong_mutation_inspection()
  {
    return $this->belongsTo(\TableMutationInspectionModel::class, 'uuid_tb_inspection');
  }

  public function trough_one_library_equipment()
  {
    return $this->hasOneThrough(
      'TableLibraryEquipmentModel',           // target table
      'TableMutationInspectionModel',         // pivot table
      'uuid',                                 // Foreign key on pivot table...
      'uuid',                                 // Foreign key on target table...
      'uuid_tb_inspection',                   // Local key on current table...
      'uuid_tb_equipment'                     // Local key on pivot table...
    );
  }

  public function trough_one_library_location()
  {
    return $this->hasOneThrough(
      'TableLibraryLocationModel',           // target table
      'TableMutationInspectionModel',        // pivot table
      'uuid',                                // Foreign key on pivot table...
      'uuid',                                // Foreign key on target table...
      'uuid_tb_inspection',                  // Local key on current table...
      'uuid_tb_location'                     // Local key on pivot table...
    );
  }

  public function trough_one_employee()
  {
    return $this->hasOneThrough(
      'TableEmployeeModel',                   // target table
      'TableMutationInspectionModel',         // pivot table
      'uuid',                                 // Foreign key on pivot table...
      'uuid',                                 // Foreign key on target table...
      'uuid_tb_inspection',                   // Local key on current table...
      'uuid_tb_employee'                      // Local key on pivot table...
    );
  }
}
