<?php

// INDEPENDENT TABLE
// PRE-DEFINITION TABLE
// NON-CLUSTER

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class TableEmployeeModel extends Authenticatable implements JWTSubject
{
    use Notifiable;

    use \EmployeeQueryBoot;

	use \UserSchema;
	use \TableEmployeeSchema;
	
    use \FilterPaginateAdvanceUtility;
    use \TableEmployeeFilter;
    use \TableEmployeeAttribute;

    public $incrementing = false;
    protected $primaryKey = 'uuid';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
		
		  // origin
		  if (!ifTableExist("tb_employee")) {
			$this->createStaticTableEmployeeSchema("tb_employee");
		  }

		  // mirror
		  if (!ifViewExist("user")) {
			$this->createStaticViewUserSchema("user");
		  }

		  $this->table = "tb_employee";				
    }

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
        'plain_password_employee',
        'verification_employee',
        'disable_employee',
        'created_at',
        'updated_at',
    ];

    protected $guard = [];

    protected $hidden = [];

    // public function many_mutation_inspection()
    public function tb_mutation_inspection()
    {
        return $this->hasMany(\TableMutationInspectionModel::class, 'uuid_tb_employee');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
