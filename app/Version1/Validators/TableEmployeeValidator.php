<?php

trait TableEmployeeValidator
{
    public function employeeValidator()
    {
        $form =  [
            'uuid'                      => request()->uuid,
            'name_employee'             => request()->name_employee,
            'position_employee'         => request()->position_employee,
            'nik_employee'              => request()->nik_employee,
            'telpon_employee'           => request()->telpon_employee,
            'email_employee'            => request()->email_employee,
            'birth_place_employee'      => request()->birth_place_employee,
            'birth_date_employee'       => request()->birth_date_employee,
            'gender_employee'           => request()->gender_employee,
            'marital_employee'          => request()->marital_employee,
            'address_employee'          => request()->address_employee,
            'password_employee'         => request()->password_employee,
            'photo_employee'            => request()->photo_employee,
        ];

        $validator = \Validator::make($form, [
            'uuid'                      => 'required|string|digits:40|unique:tb_employee',
            'name_employee'             => 'required|string|max:50',
            'position_employee'         => 'required|in:0,1,2',
            'nik_employee'              => 'required|string|digits:16|unique:tb_employee',
            'telpon_employee'           => 'required|max:20',
            'email_employee'            => 'required|email|max:50|unique:tb_employee',
            'birth_place_employee'      => 'required|string|max:50',
            'birth_date_employee'       => 'required|string|max:10',
            'gender_employee'           => 'required|in:0,1',
            'marital_employee'          => 'required|in:0,1',
            'address_employee'          => 'required|string',
            'password_employee'         => 'required|string|max:50',
            // 'plain_password_employee'   => 'required|string|max:50',
            'photo_employee'            => 'imageable',
            // 'verification_employee'     => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            dd($validator->messages());
        }
    }
}
