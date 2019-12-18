<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionUpdateModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionUpdateFilter;
  use \TableMutationInspectionUpdateSchema;
  use \TableMutationInspectionAttribute;

  public $table_session = "";
  public $table_suffix = "";

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);

    $this->table = 'tb_mutation_inspection_update';
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
    'last_upnormal_inspection',
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
