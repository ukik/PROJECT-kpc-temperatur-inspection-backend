<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class loggedController extends Controller
{
    // use \EmployeeValidator;

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
            // 'plain_password_employee'   => request()->plain_password_employee,
            'photo_employee'            => request()->photo_employee,
            // 'verification_employee'     => request()->verification_employee,
            // 'disable_employee'          => request()->disable_employee ? '1' : '0',
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
            'password_employee'         => 'required|string|max:50',
            // 'plain_password_employee'   => 'required|string|max:50',
            // 'photo_employee'            => 'imageable',
            // 'verification_employee'     => 'required|in:0,1',
            // 'disable_employee'          => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return fallback(
                $payload = $validator->messages()
            );
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
                return fallback(
                    $payload = $validator->messages()
                );
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

            $payload['photo_employee'] = 'images/karyawan/' . $name;
        } else {
            $payload['photo_employee'] = './images/no-menu-1.png';
        }

        $form['password_employee'] = bcrypt(request()->password_employee);
        $form['plain_password_employee'] = request()->password_employee;

        $data = $model::updateOrCreate(
            ['nik_employee' => request()->nik_employee],
            $payload
        );

        return resolve([
            $payload    = null,
            $role       = $data->position_employee,
            $token      = JWTCreate(($data)),
            $logged       = true,
        ]);
    }

    public function login()
    {
        $user = \TableTableEmployeeModel::whereEmail(request()->email)->first();
        // $user = \TableEmployeeModel::first();

        return resolve(
            $payload    = $user,
            $role       = $user->position_employee,
            $token      = JWTCreate(($user)),
            $logged       = true
        );
    }

    public function logout()
    {
        JWTRevoke();

        return resolve([
            $payload    = null,
            $role       = null,
            $token      = null,
            $logged       = false,
        ]);
    }

    public function refresh() // unused
    {
        return resolve([
            $payload    = JWTUser(),
            $role       = JWTUser()->position_employee,
            $token      = JWTRefresh(),
            $logged       = true,
        ]);
    }
}
