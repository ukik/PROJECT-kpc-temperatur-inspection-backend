<?php

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TableEmployeeModel extends Authenticatable
{
    use Notifiable;

    use \FilterPaginateAdvanceUtility;
    use \TableEmployeeFilter;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $table = "tb_employee";

    protected $fillable = [
        'no',
        'uuid',
        'name_employee',
        'position_employee',
        'nik_employee',
        'telpon_employee',
        'email_employee',
        'birth_place_employee',
        'birth_date_employee',
        'gender_employee',
        'marital_employee',
        'address_employee',
        'password_employee',
        'photo_employee',
        'created_at',
        'updated_at',
    ];

    protected $guard = [
        'plain_password_employee',
        'verification_employee',
        'disable_employee',
    ];

    protected $hidden = [];

    public function many_mutation_inspection()
    {
        return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_employee');
    }

    public function trough_many_mutation_inspection_information()
    {
        return $this->hasManyThrough(
            'TableMutationInspectionInformationModel',   // target table
            'TableMutationInspectionModel',              // pivot table
            'uuid_tb_employee',                     // Foreign key on pivot table...
            'uuid_tb_inspection',                   // Foreign key on target table...
            'uuid',                                 // Local key on current table...
            'uuid'                                  // Local key on pivot table...
        );
    }
}
