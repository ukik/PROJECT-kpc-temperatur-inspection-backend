<?php

use Illuminate\Database\Eloquent\Model;

class TableLibraryEquipmentModel extends Model
{
    use \FilterPaginateUtility;
    use \TableLibraryEquipmentFilter;

    public $incrementing = false;

    protected $primaryKey = 'uuid';
    protected $foreignKey = 'label_equipment';

    protected $table = "tb_library_equipment";

    protected $fillable = [
        'name_equipment',
    ];

    protected $guard = [
        'no',
        'uuid',
        'label_equipment',
        'created_at',
        'updated_at',
    ];

    public function many_mutation_inspection()
    {
        return $this->hasMany(\TableMutationInspectionModel::class, 'equipment_inspection', 'label_equipment');
    }
}
