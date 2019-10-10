<?php

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionFilter;

  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $table = "tb_mutation_inspection";

  protected $fillable = [
    'no',
    'uuid',
    'uuid_tb_employee',
    'uuid_tb_inspection',
    'uuid_tb_equipment',
    'uuid_tb_location',
    // 'equipment_inspection',
    // 'location_inspection',
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
      \TableEmployeeModel::class,      // target class 
      'tb_mutation_inspection',   // pivot table
      'uuid',                     // target primary key
      'uuid_tb_employee'          // pivot foreign key
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

  public function one_mutation_inspection_information()
  {
    return $this->hasOne(\TableMutationInspectionInformationModel::class, 'uuid_tb_inspection', 'uuid');
  }

  public function many_mutation_inspection()
  {
    return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_inspection');
  }
}
