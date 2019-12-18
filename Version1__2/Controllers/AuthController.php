<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

use App\User;

class AuthController extends Controller
{
    public function __construct()
    {
        setter('private', false);
    }

    public function register(Request $request)
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
            ImageManagerStatic::make(request()->photo_employee);
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

                if ($request->has('nik_employee')) {
                    $image_exists = $model::find(request()->nik_employee)->value('photo_employee');
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

        $form['password_employee'] = bcrypt(request()->password_employee);
        $form['plain_password_employee'] = request()->password_employee;

        $data = $model::create($form);

        // \Mail::to(env('MAIL_USERNAME', null))->send(new \NewRegisterAdminMail($data->first()));
        // \Mail::to($data->email_employee)->send(new \NewRegisterUserMail($data->first()));

        $data->notify(new \NewEmployeeNotification($data));
        // \Notification::send($data, new \NewEmployeeNotification($data));

        return Resolver([
            'payload'    => $data,
            'credentials' => [
                'role'       => null,
                'token'      => null,
                'logged'     => logged(),
            ]
        ]);
    }

    public function login(Request $request)
    {
		$model = \TableEmployeeModel::class;
		
		$disable = $model::whereEmailEmployee(request()->email_employee)->where('disable_employee', '1')->first();
		if($disable){
			return Resolver([
				'payload'    => null,
				'status'	 => 'disable',
				'credentials' => [
					'token'      => null,
					'role'       => null,
					'logged'     => false,
				]
			]);			
		}

        $credentials = [
            'email' => request()->email_employee,
            'password' => request()->password_employee,
        ];

        try {
            // tidak bisa pakai token ini, karena field tb_employee
            // email_employee && password_employee
            // sementara field email && password di view users hanya untuk attempt saja
            // attempt = login
            if (!$token = \JWTAuth::attempt($credentials)) {
                return response()->json([
                    'token' => 'invalid_credentials'
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'token' => 'could_not_create_token'
            ], 500);
        }

        $data = $model::whereEmailEmployee(request()->email_employee)->first(); //\TableEmployeeModel::whereEmailEmployee(request()->email_employee)->first();

        // create new token base tb_employee
        $token = JWTCreate(($data));

        return Resolver([
            'payload'    => $data,
            'credentials' => [
                'token'      => $token,
                'role'       => $data->position_employee,
                'logged'     => $token ? true : false,
            ]
        ]);
    }

    public function forget(Request $request)
    {
        $data = \TableEmployeeModel::whereEmailEmployee(request()->email_employee)->first();

        if (!$data) {
            return Resolver([
                'payload'   => null,
                'status'    => "invalid_email"
            ]);
        }

        $token = JWTCreate($data);
        setter('token', $token);

        try {
            \Mail::to(request()->email_employee)->send(new \ForgetPasswordUserMail($data));
        } catch (\Throwable $th) {
            //throw $th;
        }

        return Resolver([
            'status'       => 'forget',
            'payload'    => null,
            'credentials' => [
                'token'      => null,
                'role'       => null,
                'logged'     => false,
            ]
        ]);
    }

    public function logout()
    {
        JWTRevoke();

        return Resolver([
            'payload'    	=> null,
			'status'		=> 'logout',
            'credentials' 	=> [
                'role'       => null,
                'token'      => null,
                'logged'     => false,
            ]
        ]);
    }

    public function refresh() // unused
    {
        return Resolver([
            'payload'    => null,
            'credentials' => [
                'role'       => role(),
                'token'      => JWTRefresh(),
                'logged'     => logged(),
            ]
        ]);
    }
}
