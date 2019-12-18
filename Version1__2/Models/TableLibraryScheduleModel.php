<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableLibraryScheduleModel extends Model
{
    use \FilterPaginateAdvanceUtility;
    use \TableLibraryLocationFilter;

    public $incrementing = false;
    protected $primaryKey = 'uuid';
    protected $foreignKey = 'label_schedule';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'tb_library_schedule';
    }

    protected $fillable = [
        'starttime_schedule',
        'endtime_schedule',
    ];

    protected $guard = [
        'no',
        'uuid',
        'label_schedule',
        'created_at',
        'updated_at',
    ];

    public function tb_mutation_inspection()
    {
        return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_schedule', 'uuid');
    }
}
