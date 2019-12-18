<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionUpdateModel__ extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionUpdateFilter;
  use \TableMutationInspectionUpdateSchema;

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);

    if (!ifTableExist("tb_mutation_inspection_update")) {
      $this->createStaticTableMutationInspectionUpdateSchema("tb_mutation_inspection_update");
    }

    $this->table = "tb_mutation_inspection_update";

    return;
  }

  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $fillable = [
    'uuid',
    'uuid_tb_inspection',
    'uuid_tb_employee',
    'uuid_tb_schedule',
    'uuid_tb_location',
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
      'tb_mutation_inspection_update',       // Update table
      'uuid',                         // target primary key
      'uuid_tb_employee'              // Update foreign key
    );
  }

  public function belong_mutation_inspection()
  {
    return $this->belongsTo(\TableMutationInspectionModel::class, 'uuid_tb_inspection', 'uuid');
  }
}
