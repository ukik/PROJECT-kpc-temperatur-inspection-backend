<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableLibraryEquipmentModel extends Model
{
    use \FilterPaginateAdvanceUtility;
    use \TableLibraryEquipmentFilter;
    use \TableLibraryEquipmentAttribute;

    public $incrementing = false;
    protected $primaryKey = 'uuid';
    protected $foreignKey = 'label_equipment';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'tb_library_equipment';

        switch (request()->type) {
            case "select":
                $this->append([
                    'location',
                ]);
                break;
        }
    }

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

    public function tb_mutation_inspection()
    {
        return $this->hasMany(\TableMutationEquipmentnModel::class, 'uuid_tb_equipment', 'uuid');
    }
}
