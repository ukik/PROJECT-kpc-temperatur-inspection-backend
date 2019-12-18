<?php

trait TableEmployeeFilter
{
  protected $filter = [
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
    'plain_password_employee',
    'photo_employee',
    'verification_employee',
	'verification_token',
    'disable_employee',
    'created_at',
    'updated_at',
  ];

  public static function initialize()
  {
    return [
      'no'                        => '',
      'uuid'                      => '',
      'name_employee'             => '',
      'position_employee'         => '',
      'nik_employee'              => '',
      'telpon_employee'           => '',
      'email_employee'            => '',
      'birth_place_employee'      => '',
      'birth_date_employee'       => '',
      'gender_employee'           => '',
      'marital_employee'          => '',
      'address_employee'          => '',
      'password_employee'         => '',
      'plain_password_employee'   => '',
      'photo_employee'            => '',
      'verification_employee'     => '',
	  'verification_token'		  => '',
      'disable_employee'          => '',
      'created_at'                => '',
      'updated_at'                => '',
    ];
  }
}
