<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class InitController extends Controller
{

    public function index(Request $request)
    {
		if(TokenCheck($request)) {
			return Resolver([
				'payload'    => null,
				'credentials' => [
					'role'       => role(),
					'token'		 => bearerToken($request),
					'logged'     => logged(),
				]
			]);
		};
		
		return Resolver([
			'payload'    => null,
			'credentials' => [
				'role'       => null,
				'token'		 => null,
				'logged'     => false,
			]
		]);
    }
}