<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewLibraryEquipmentLocationController extends Controller
{
    public function index(Request $request)
    {

		$data = \ViewLibraryEquipmentLocationModel::all();
			
		return Resolver([
			'payload'    => $data,
			'credentials' => [
				'role'       => role(),
				// 'token'      => JWTToken(),
				'logged'     => logged(),
			]
		]);
    }

}
