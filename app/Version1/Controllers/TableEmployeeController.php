<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class TableEmployeeController extends Controller
{

    public function index(Request $request)
    {
			switch (request()->type) {
				case "select":
				
					if(user()->position == 0){
						$data = \TableEmployeeModel::orderBy('no', 'asc')
							->select(['uuid', 'name_employee'])
							->get();
					} else {
						
						$data = \TableEmployeeModel::where('uuid', user()->uuid)
							->orderBy('no', 'asc')
							->select(['uuid', 'name_employee'])
							->get();
					}
						
					break;
				default:
					$direction = request()->direction == null ? 'desc' : request()->direction;
					
					if(user()->position == 0){
						
						$data = \TableEmployeeModel::orderBy(request()->sortBy, $direction)
							->filterPaginate();
							
					} else {
						
						$data = \TableEmployeeModel::where('uuid', user()->uuid)
							->orderBy(request()->sortBy, $direction)
							->filterPaginate();
					}						
							
					break;
			}
			

		return Resolver([
			'payload'    => $data,
			'credentials' => [
				'role'       => role(),
				// 'token'      => JWTToken(),
				'logged'     => logged(),
			]
		]);
    }

    public function store(Request $request)
    {
        $form =  [
            'uuid'                      => 'TEM-' . uuid(),
            'name_employee'             => request()->name_employee,
            'position_employee'         => strval(request()->position_employee),
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
            'uuid'                      => 'required|string|max:40|min:40',
            'name_employee'             => 'required|string|max:50',
            'position_employee'         => 'required|in:0,1,2',
            'nik_employee'              => 'required|string|digits:16|unique:tb_employee,nik_employee',
            'telpon_employee'           => 'required|max:20',
            'email_employee'            => 'required|email|max:50|unique:tb_employee,email_employee',
            'birth_place_employee'      => 'required|string|max:50',
            'birth_date_employee'       => 'required|string|max:10',
            'gender_employee'           => 'required|in:0,1',
            'marital_employee'          => 'required|in:0,1',
            'address_employee'          => 'required|string',
            'password_employee'         => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation"
            ]);
        }

        try {
			// pastikan intervention sudah dipasang di config/app.php
            \Image::make(request()->photo_employee);
            $foto = true;
        } catch (\Exception $e) {
            $foto = false;
        }

        $model = \TableEmployeeModel::class;

        if ($foto) {

            $validator = \Validator::make(['photo_employee' => request()->photo_employee], [
                'photo_employee'  => 'bail|required|imageable',
            ]);

            if ($validator->fails()) {
                return Resolver([
                    'payload'   => $validator->messages(),
                    'status'    => "validation"
                ]);
            }

            if ($request->get('photo_employee')) {
                $image = $request->get('photo_employee');
                $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

                if (!file_exists(public_path('images/karyawan/'))) {
                    mkdir(public_path('images/karyawan/'), 666, true);
                }

                \Image::make($request->get('photo_employee'))->save(public_path('images/karyawan/') . $name);
            }

            $form['photo_employee'] = $request->getSchemeAndHttpHost().'/images/karyawan/' . $name;
        } else {
            $form['photo_employee'] = $request->getSchemeAndHttpHost().'/images/no-menu-1.png';
        }

        $form['password_employee'] = bcrypt(request()->password_employee);
        $form['plain_password_employee'] = request()->password_employee;
		
        $data = $model::create($form);

		\Mail::to($data->email_employee)->send(new \NewRegisterUserMail($data->first()));
        $data->notify(new \NewEmployeeNotification($data));

        return Resolver([
            'payload'    => $data,
			'status'	=> 'private-karyawan-registered',
            'credentials' => [
                'role'       => role(),
                // 'token'      => JWTToken(),
                'logged'     => logged(),
            ]
        ]);
    }

    public function update(Request $request)
    {

		$form =  [
            'uuid'                      => request()->uuid,
            'name_employee'             => request()->name_employee,
            'position_employee'         => strval(request()->position_employee),
            'nik_employee'              => request()->nik_employee,
            'telpon_employee'           => request()->telpon_employee,
            'email_employee'            => request()->email_employee,
            'birth_place_employee'      => request()->birth_place_employee,
            'birth_date_employee'       => request()->birth_date_employee,
            'gender_employee'           => strval(request()->gender_employee),
            'marital_employee'          => strval(request()->marital_employee),
            'address_employee'          => request()->address_employee,
            'password_employee'         => request()->password_employee,
            'photo_employee'            => request()->photo_employee,
            'verification_employee'     => strval(request()->verification_employee),
            'disable_employee'          => request()->disable_employee ? '1' : '0',
        ];


        $validator = \Validator::make($form, [
            'uuid'                      => 'required|string|max:40|min:40',
            'name_employee'             => 'required|string|max:50',
            'position_employee'         => 'required|in:0,1,2',
            'nik_employee'              => 'required|string|digits:16',
            'telpon_employee'           => 'required|max:20',
            'email_employee'            => 'required|email|max:50',
            'birth_place_employee'      => 'required|string|max:50',
            'birth_date_employee'       => 'required|string|max:10',
            'gender_employee'           => 'required|in:0,1',
            'marital_employee'          => 'required|in:0,1',
            'address_employee'          => 'required|string',
            //'password_employee'         => 'required|string|max:50',
            'verification_employee'     => 'required|in:0,1',
            'disable_employee'          => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation"
            ]);
        }

        try {
			// pastikan intervention sudah dipasang di config/app.php
            \Image::make(request()->photo_employee);
            $foto = true;
        } catch (\Exception $e) {
            $foto = false;
        }

        $model = \TableEmployeeModel::class;

        try {
            
            if ($foto) {
    
                $validator = \Validator::make(['photo_employee' => request()->photo_employee], [
                    'photo_employee'  => 'bail|required|imageable',
                ]);
    
                if ($validator->fails()) {
                    return Resolver([
                        'payload'   => $validator->messages(),
                        'status'    => "validation"
                    ]);
                }
    
                if ($request->get('photo_employee')) {
                    $image = $request->get('photo_employee');
                    
                    //$name = ((explode('/', $image)[count(explode('/', $image))-1]));
                    //$name = ((explode('.', $name)[count(explode('.', $name))-1]));
                    //$name =  time() . '.' . $name;
                    
                    $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
    
                    if (!file_exists(public_path('images/karyawan/'))) {
                        mkdir(public_path('images/karyawan/'), 666, true);
                    }
    
    				/*
                    if ($request->has('nik_employee')) {
                        $image_exists = $model::where('nik_employee', request()->nik_employee)->value('photo_employee');
                        if (\File::exists($image_exists)) {
                            \File::delete($image_exists);
                        }
                    }
    				*/
    				// replace if same
                    if ($request->has('nik_employee')) {
                        $image_exists = $model::where('nik_employee', request()->nik_employee)->value('photo_employee');
    					$image_exists = "./images/karyawan/".substr($image_exists, strrpos($image_exists, '/') + 1);
                        if (\File::exists($image_exists)) {
                            \File::delete($image_exists);
                        }
                    }
    
                    \Image::make($request->get('photo_employee'))->save(public_path('images/karyawan/') . $name);
                }
    
                $form['photo_employee'] = $request->getSchemeAndHttpHost().'/images/karyawan/' . $name;
            } else {
                $form['photo_employee'] = $request->getSchemeAndHttpHost().'/images/no-menu-1.png';
            }
        
        } catch (\Exception $e) {
            //$foto = false;
        }
		
		$data = $model::whereUuid(request()->uuid);

		if ($request->get('password_employee') != $data->first()->password_employee) {
			$form['password_employee'] = bcrypt(request()->password_employee);
			$form['plain_password_employee'] = request()->password_employee;
		}
        
        $data->update($form);

		// delete notification based on current data
		\NotificationModel::where('item_id', request()->uuid)->delete();		

        return Resolver([
            'payload'    => $data->first(),
			'status'	=> 'private-karyawan-updated',
            'credentials' => [
                'role'       => role(),
                // 'token'      => JWTToken(),
                'logged'     => logged(),
            ]
        ]);
    }

}
