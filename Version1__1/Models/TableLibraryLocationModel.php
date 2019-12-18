<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableLibraryLocationModel extends Model
{
    use \FilterPaginateAdvanceUtility;
    use \TableLibraryLocationFilter;
    use \TableLibraryLocationAttribute;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'tb_library_location';

        switch (request()->type) {
            case "select":
                $this->append([
                    'place',
                ]);
                break;
        }
    }

    public $incrementing = false;

    protected $primaryKey = 'uuid';
    protected $foreignKey = 'label_location';

    protected $fillable = [
        'name_location',
    ];

    protected $guard = [
        'no',
        'uuid',
        'label_location',
        'created_at',
        'updated_at',
    ];

    public function many_mutation_inspection()
    {
        return $this->hasMany(\TableMutationLocationModel::class, 'uuid_tb_location', 'uuid');
    }

    // public function many_mutation_inspection()
    // {
    //     return $this->hasMany(\TableMutationInspectionModel::class, 'location_inspection', 'label_location');
    // }
}
