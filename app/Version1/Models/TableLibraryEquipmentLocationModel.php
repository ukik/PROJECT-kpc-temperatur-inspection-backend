<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class TableLibraryEquipmentLocationModel extends Model
{
    //use \FilterPaginateAdvanceUtility;
    //use \TableLibraryEquipmentLocationFilter;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $foreignKey = 'equipment_alias';
	
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'tb_library_equipment_location';

    }

    protected $guard = [
		'id',
		'equipment_alias',
		'location_alias',
		'location_name',
		'place',
		'created_at',
		'updated_at',
    ];


}
