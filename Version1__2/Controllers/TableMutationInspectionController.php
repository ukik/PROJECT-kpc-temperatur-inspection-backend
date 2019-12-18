<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableMutationInspectionController extends Controller
{
    public function index(Request $request)
    {
		$validation = request()->validation == "valid" ? 'true' : 'false';		
		// TM = temperature man
		if(user()->position == 2){
			
			$data = \ViewMutationInspectionModel::where('uuid_tb_employee', user()->uuid)->where('valid_inspection', $validation)->groupBy('uuid')->filterPaginate();
			
		} else {
			
			$data = \ViewMutationInspectionModel::where('valid_inspection', $validation)->groupBy('uuid')->filterPaginate();
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
		// batas maksimal tahun
		if(date('Y') < request()->year){
            return Resolver([
                'payload'   => ["batas maksimal tahun pengisian data ".date("Y")],
                'status'    => "validation",
                'credentials' => [
                    'role'       => role(),
                    'logged'     => logged(),
                ]
            ]);
		}			
		// batas minimal tahun
		if((date('Y')-1) > request()->year){
            return Resolver([
                'payload'   => ["batas minimal tahun pengisian data ".(date("Y")-1)],
                'status'    => "validation",
                'credentials' => [
                    'role'       => role(),
                    'logged'     => logged(),
                ]
            ]);
		}			
		
        $form =  [
            'uuid'                          => 'TIS-' . uuid(),
            'uuid_tb_employee'              => request()->uuid_tb_employee,
            'uuid_tb_schedule'              => request()->uuid_tb_schedule,
            'uuid_tb_equipment'             => request()->uuid_tb_equipment,
            'uuid_tb_location'              => request()->uuid_tb_location,
            'place_inspection'              => request()->place_inspection,
            'condition_inspection'          => request()->condition_inspection,
            'grease_shoot_inspection'       => request()->grease_shoot_inspection,
            'weather_inspection'            => request()->weather_inspection,
            'temperature_inspection'        => request()->temperature_inspection,
            'rain_inspection'               => request()->rain_inspection,
            'current_upnormal_inspection'   => request()->current_upnormal_inspection,
            'last_upnormal_inspection'      => request()->last_upnormal_inspection,
            // 'screenshoot_inspection'        => request()->screenshoot_inspection,
        ];

        $validator = \Validator::make($form, [
            'uuid'                          => 'required|string|max:40|min:40',
            'uuid_tb_employee'              => 'required|string|max:40|min:40',
            'uuid_tb_schedule'              => 'required|string|max:40|min:40',
            'uuid_tb_location'              => 'required|string|max:40|min:40',
            'condition_inspection'          => 'required|in:1,2,3',
            'grease_shoot_inspection'       => 'required|numeric|max:100',
            'weather_inspection'            => 'required|in:1,2,3,4,5,6',
            'temperature_inspection'        => 'required|numeric|max:100',
            'rain_inspection'               => 'required|numeric|max:100',
            'current_upnormal_inspection'   => 'required|in:0,1',
            'last_upnormal_inspection'      => 'required|in:0,1',
            // 'screenshoot_inspection'        => 'imageable',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation",
                'credentials' => [
                    'role'       => role(),
                    // 'token'      => JWTToken(),
                    'logged'     => logged(),
                ]
            ]);
        }

        $form['condition_inspection']          = strval(request()->condition_inspection);
        $form['weather_inspection']            = strval(request()->weather_inspection);
        $form['current_upnormal_inspection']   = strval(request()->current_upnormal_inspection);
        $form['last_upnormal_inspection']      = strval(request()->last_upnormal_inspection);

        $data = \TableMutationInspectionModel::create($form);
		
		$data->notify(new \NewInspectionNotification($data));
		
        return Resolver([
            'payload'    => $data,
			'status'	=> $data->getTable(),
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
            'uuid'                          => request()->uuid,
        ];

        $validator = \Validator::make($form, [
            'uuid'                          => 'required|string|max:40|min:40',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation",
                'credentials' => [
                    'role'       => role(),
                    // 'token'      => JWTToken(),
                    'logged'     => logged(),
                ]
            ]);
        }

        $data = \TableMutationInspectionModel::whereUuid(request()->uuid);
		$update = $data->update(['valid_inspection' => "1"]);

		\NotificationModel::where('item_id', request()->uuid)->delete();		

        return Resolver([
            'payload'    => $data->first(),
            'credentials' => [
                'role'       => role(),
                // 'token'      => JWTToken(),
                'logged'     => logged(),
            ]
        ]);
    }

    public function destroy()
    {
        \TableMutationInspectionModel::whereUuid(request()->uuid)->delete();

		\NotificationModel::where('item_id', request()->uuid)->delete();	

        return Resolver([
            'payload'    => null,
            'credentials' => [
                'role'       => role(),
                // 'token'      => JWTToken(),
                'logged'     => logged(),
            ]
        ]);
    }
}
