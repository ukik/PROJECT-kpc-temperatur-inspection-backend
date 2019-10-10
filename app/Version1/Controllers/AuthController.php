<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    use \EmployeeValidator;

    public function register(Request $request)
    {
        $form =  [
            'uuid'                      => 'TEM-'.uuid(), 
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
            // 'plain_password_employee'   => request()->password_employee,
            'photo_employee'            => request()->photo_employee,
            // 'verification_employee'     => request()->verification_employee,  
        ];

        $this->employeeValidation($form);

        // try {
        //     ImageManagerStatic::make(request()->photo_employee);
        //     $foto = true;
        // } catch (\Exception $e) {
        //     $foto = false;
        // }

        // if($foto){

        //     $validator = \Validator::make([ 'photo_employee' => request()->foto ], [         
        //         'photo_employee'  => 'bail|required|imageable',
        //     ]);     

        //     if($validator->fails()) {
        //         warning([
        //             'fails' => true,
        //             'messages' => $validator->messages(),
        //         ]);   
        //     }        
            
        //     if($request->get('photo_employee')) {
        //         $image = $request->get('photo_employee');
        //         $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

        //         if (!file_exists(public_path('images/employee/'))) {
        //                 mkdir(public_path('images/employee/'), 666, true);
        //             }

        //         \Image::make($request->get('photo_employee'))->save(public_path('images/employee/').$name);
        //     }
                
        //     $form['photo_employee'] = 'images/employee/'.$name;

        // } else {

        //     $form['photo_employee'] = './images/no-menu-1.png';

        // }         

        // $validator = \Validator::make($form, [
        //     'uuid'                      => 'required|string|min:39|max:40|unique:tb_employee',
        //     'name_employee'             => 'required|string|max:50', 
        //     'position_employee'         => 'required|in:0,1,2',
        //     'nik_employee'              => 'required|string|min:15|max:16|unique:tb_employee',
        //     'telpon_employee'           => 'required|max:20',
        //     'email_employee'            => 'required|email|max:50|unique:tb_employee',
        //     'birth_place_employee'      => 'required|string|max:50',
        //     'birth_date_employee'       => 'required|string|max:10',
        //     'gender_employee'           => 'required|in:0,1',
        //     'marital_employee'          => 'required|in:0,1',
        //     'address_employee'          => 'required|string',
        //     'password_employee'         => 'required|string|max:50',
        //     // 'plain_password_employee'   => 'required|string|max:50',
        //     'photo_employee'            => 'imageable',
        //     // 'verification_employee'     => 'required|in:0,1',
        // ]);

        // if($validator->fails()) {
        //     warning([
        //         'fails' => true,
        //         'messages' => $validator->messages(),
        //     ]);     
        // }

        $form['password_employee'] = bcrypt(request()->password_employee);
        $form['plain_password_employee'] = bcrypt(request()->password_employee);

        $data = \EmployeeModel::create($form);

        return resolve([
            $payload    = null, 
            $role       = $data->position_employee, 
            $token      = JWTCreate(($data)), 
            $auth       = true,
        ]);

    }

    public function login()
    {
        $user = \EmployeeModel::whereEmail(request()->email)->first();
        // $user = \EmployeeModel::first();

        return resolve(
            $payload    = $user, 
            $role       = $user->position_employee, 
            $token      = JWTCreate(($user)), 
            $auth       = true);
    }

    public function logout(Type $var = null)
    {
        JWTRevoke();

        return resolve([
            $payload    = null, 
            $role       = null, 
            $token      = null, 
            $auth       = false,
        ]);
    }

    public function refresh() // unused
    {
        return resolve([
            $payload    = JWTUser(), 
            $role       = JWTUser()->position_employee, 
            $token      = JWTRefresh(), 
            $auth       = true,
        ]);        
    }
}