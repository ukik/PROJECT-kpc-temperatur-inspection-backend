<?php

namespace App\Utilities;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic;

use Facades\Tymon\JWTAuth\JWTAuth;
use Facades\Tymon\JWTAuth\Exceptions\JWTException;
use Facades\Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Facades\Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JWTUtility extends Controller
{
    public function login()
    {
        $scopes = [
            'secret' => 'muhamadduki@gmail.com'
        ];
		
		$user = \KaryawanModel::whereEmail(request()->email)->first();

		$token = JWTAuth::fromUser($user, $scopes);

        return response()->json([
            'token' => $token,
            'role'  => $user->jabatan,
            'auth'  => true,
        ])        
        ->header('Content-Type', 'application/json')
        ->header('Content-Type', 'application/x-www-form-urlencoded')
        ->setStatusCode(200);
    }

    public function register(Request $request)
    {

        try {
            ImageManagerStatic::make(request()->foto);
            $foto = true;
        } catch (\Exception $e) {
            $foto = false;
        }

        $payload =  [
            'nik'                   => request()->nik,
            'nama_depan'            => request()->nama_depan,
            'nama_belakang'         => request()->nama_belakang,
            'jabatan'               => request()->jabatan,
            'alamat'                => request()->alamat,
            'telpon'                => request()->telpon,
            'password'              => bcrypt(request()->password),
            'email'                 => request()->email,
            'tempat_lahir'          => request()->tempat_lahir,
            'tanggal_lahir'         => request()->tanggal_lahir,
            'jenis_kelamin'         => request()->jenis_kelamin,
            'status'                => request()->status,
            'pendidikan_terakhir'   => request()->pendidikan_terakhir,
            'gaji'                  => request()->gaji,           
        ];

        if($foto){

            $validator = \Validator::make([ 'foto' => request()->foto ], [         
                'foto'  => 'bail|required|imageable',
            ]);     

            if($validator->fails()) {
                return response()->json([
                    'fails' => true,
                    'messages' => $validator->messages(),
                ])        
                ->header('Content-Type', 'application/json')
                ->header('Content-Type', 'application/x-www-form-urlencoded')
                ->setStatusCode(200);          
            }        
            
            if($request->get('foto')) {
                $image = $request->get('foto');
                $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

                if (!file_exists(public_path('images/karyawan/'))) {
                        mkdir(public_path('images/karyawan/'), 666, true);
                    }

                \Image::make($request->get('foto'))->save(public_path('images/karyawan/').$name);
            }
                
            $payload['foto'] = 'images/karyawan/'.$name;

        } else {

            $payload['foto'] = './images/no-menu-1.png';

        }         

        $validator = \Validator::make($payload, [
            'nik'                   => 'required|string|min:15|max:16|unique:karyawan',
            'nama_depan'            => 'required|string|max:35',
            'alamat'                => 'required|string',
            'telpon'                => 'required|string|max:30',
            'email'                 => 'required|email|max:40|unique:karyawan',
            'password'              => 'required|string',
            'tempat_lahir'          => 'required|string|max:30',
            'tanggal_lahir'         => 'required|string|max:20',
            'jenis_kelamin'         => 'required|in:laki-laki,perempuan',
            'status'                => 'required|in:lajang,menikah',
            'pendidikan_terakhir'   => 'required|in:SD,SMP,SMA,SMK,MA,D3,S1,S2,S3,PROF',
            'gaji'                  => 'required|numeric',                
        ]);

        if($validator->fails()) {
            return response()->json([
                'fails' => true,
                'messages' => $validator->messages(),
            ])        
            ->header('Content-Type', 'application/json')
            ->header('Content-Type', 'application/x-www-form-urlencoded')
            ->setStatusCode(200);          
        }

        $data = \KaryawanModel::create($payload);

        $scopes = [
            'secret' => 'muhamadduki@gmail.com'
        ];

        $token = JWTAuth::fromUser($data, $scopes);

        // all good so return the token
        return response()->json([
            'token' => $token,
            'role'  => $data->jabatan,
            'auth'  => true,
        ])        
        ->header('Content-Type', 'application/json')
        ->header('Content-Type', 'application/x-www-form-urlencoded')
        ->setStatusCode(200);

    }    

    public function refresh()
    {
        $credentials = JWTAuth::toUser(JWTAuth::getToken());

        $scopes = [
            'secret' => 'muhamadduki@gmail.com'
        ];

        $token = JWTAuth::fromUser($credentials, $scopes);

        // all good so return the token
        return response()->json([
            'token' => $token,
            'role'  => $credentials->jabatan,
            'auth'  => true,
        ])        
        ->header('Content-Type', 'application/json')
        ->header('Content-Type', 'application/x-www-form-urlencoded')
        ->setStatusCode(200);
    }        

    public function logout()
    {
        try {
            // if (JWTAuth::invalidate(JWTToken())) {
            if (!JWTAuth::parseToken()->invalidate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json([
            'token' => null,
            'role'  => '',
            'auth'  => false,
        ])        
        ->header('Content-Type', 'application/json')
        ->header('Content-Type', 'application/x-www-form-urlencoded')
        ->setStatusCode(200);        
    }        
}