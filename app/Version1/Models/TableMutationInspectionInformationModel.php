<?php

use Illuminate\Database\Eloquent\Model;

class TableMutationInspectionInformationModel extends Model
{
  // use \FilterPaginateUtility;
  use \FilterPaginateAdvanceUtility;
  use \TableMutationInspectionInformationFilter;

  public $incrementing = false;

  protected $primaryKey = 'uuid_tb_inspection';

  protected $table = "tb_mutation_inspection_information";

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
      'TableLibraryEquipmentModel',                // target table
      'TableMutationInspectionModel',              // pivot table
      'uuid',                                 // Foreign key on pivot table...
      'uuid',                                 // Foreign key on target table...
      'uuid_tb_inspection',                   // Local key on current table...
      'uuid_tb_equipment'                     // Local key on pivot table...
    );
  }

  public function belong_library_location()
  {
    return $this->hasOneThrough(
      'TableLibraryLocationModel',                // target table
      'TableMutationInspectionModel',             // pivot table
      'uuid',                                // Foreign key on pivot table...
      'uuid',                                // Foreign key on target table...
      'uuid_tb_inspection',                  // Local key on current table...
      'uuid_tb_location'                     // Local key on pivot table...
    );
  }

  public function belong_employee()
  {
    return $this->hasOneThrough(
      'TableEmployeeModel',                        // target table
      'TableMutationInspectionModel',              // pivot table
      'uuid',                                 // Foreign key on pivot table...
      'uuid',                                 // Foreign key on target table...
      'uuid_tb_inspection',                   // Local key on current table...
      'uuid_tb_employee'                      // Local key on pivot table...
    );
  }
}
