<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

	use \UserSchema;
	use \TableEmployeeSchema;

    protected $table = "user";
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

		  $this->table = "user";				
    }

    protected $fillable = [
		'no',
		'uuid',
		'name',
		'position',
		'nik',
		'telpon',
		'email',
		'birth_place',
		'birth_date',
		'gender',
		'marital',
		'address',
		'password',
		'plain_password',
		'photo',
		'verification',
		'token',
		'disable',
		'created_at',
		'updated_at',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
