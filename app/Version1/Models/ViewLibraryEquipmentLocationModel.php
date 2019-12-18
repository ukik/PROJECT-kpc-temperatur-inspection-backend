<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Database\Eloquent\Model;

class ViewLibraryEquipmentLocationModel extends Model
{
    //use \FilterPaginateAdvanceUtility;
    //use \TableLibraryEquipmentLocationFilter;

    public $incrementing = false;
    protected $primaryKey = 'id';
	
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'vw_library_equipment_location';
    }

    protected $guard = [
		'id',
		'label_equipment',
		'label_location',
		'name',
		'place',
		'created_at',
		'updated_at',
		'uuid',
    ];


}
