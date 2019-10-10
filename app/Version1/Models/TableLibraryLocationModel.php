<?php

use Illuminate\Database\Eloquent\Model;

class TableLibraryLocationModel extends Model
{
    use \FilterPaginateUtility;
    use \TableLibraryLocationFilter;

    public $incrementing = false;

    protected $primaryKey = 'uuid';
    protected $foreignKey = 'label_location';

    protected $table = "tb_library_location";

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
        return $this->hasMany(\TableMutationInspectionModel::class, 'location_inspection', 'label_location');
    }
}
