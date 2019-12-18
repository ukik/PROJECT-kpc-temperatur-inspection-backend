<?php

// INDEPENDENT TABLE
// RUNTIME DEFINITION TABLE
// NON CLUSTER

use Illuminate\Database\Eloquent\Model;

class ViewMutationInspectionUpdateModel extends Model
{
  use \FilterPaginateUtility;
  // use \FilterPaginateAdvanceUtility;
  use \ViewMutationInspectionUpdateFilter;
  use \ViewMutationInspectionUpdateSchema;
  use \TableMutationInspectionUpdateSchema;

  public function __construct($attributes = [])
  {
    parent::__construct($attributes);

    // origin
    if (!ifTableExist("tb_mutation_inspection_update")) {
      $this->createStaticTableMutationInspectionUpdateSchema("tb_mutation_inspection_update");
    }

    // mirror
    if (!ifViewExist("vw_mutation_inspection_update")) {
      $this->createStaticViewMutationInspectionUpdateSchema("vw_mutation_inspection_update");
    }

    $this->table = "vw_mutation_inspection_update";

    return;
  }

  public $incrementing = false;

  protected $primaryKey = 'uuid';

  protected $fillable = [
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

  public function many_mutation_inspection_information()
  {
    return $this->hasMany(\TableMutationInspectionInformationModel::class, 'uuid_tb_inspection', 'uuid');
  }
}
