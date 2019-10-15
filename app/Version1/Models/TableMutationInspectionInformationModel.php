<?php

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionInformationModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionInformationFilter;
  use \TableMutationInspectionInformationSchema;

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

        if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
          // fresh create berdasarkan current Date
          if($year <= date('Y') && $month <= date('m')){
            $this->createDynamicTable("tb_mutation_inspection_information_{$year}_{$month}");
          }
        } 
        
        $this->table = "tb_mutation_inspection_information_{$year}_{$month}";
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

      if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
        // batas terakhir adalah current Date
        if($year <= date('Y') && $month <= date('m')){
          $this->createDynamicTable("tb_mutation_inspection_information_{$year}_{$month}");
        }
      } 
      
      $this->table = "tb_mutation_inspection_information_{$year}_{$month}";
      return;
  }

  public $incrementing = false;

  protected $primaryKey = 'uuid_tb_inspection';

  protected $fillable = [
    'no',
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

  public function belong_library_equipment()
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

  public function belong_library_location()
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

  public function belong_employee()
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
