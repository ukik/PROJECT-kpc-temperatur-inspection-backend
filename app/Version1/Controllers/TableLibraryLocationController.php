<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryLocationController extends Controller
{
    public function index(Request $request)
    {

			switch (request()->type) {
				case "select":
					/*
					$equipment = 'E00'; //request()->equipment_alias;
					
					$locations = \TableLibraryLocationModel::all ();
					return $equipments = \TableLibraryEquipmentLocationModel::where('equipment_alias', $equipment)->get();
					
					foreach($equipments as $eq => $equip){
						echo $location->label_location;
					}					
					
					//$equipments = \TableLibraryEquipmentLocationModel::where('equipment_alias', $equipment)->get();
					
					$locations = \TableLibraryLocationModel::orderBy('no', 'asc')
						->select(['uuid', 'name_location', 'label_location'])
						->get();
						

					
					return;
					*/
					$data = \TableLibraryLocationModel::orderBy('no', 'asc')
						->select(['uuid', 'name_location', 'label_location'])
						->get();
					break;
				
				default:
					$direction = request()->direction == null ? 'desc' : request()->direction;
					$data = \TableLibraryLocationModel::orderBy('label_location', $direction)
						->filterPaginate();
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


    public function show(Request $request, $uuid)
    {
        $data = \TableLibraryLocationModel::findOrFail($uuid);

        return resolver(
            $request = $request,
            $payload = $data->first(),
            $auth = true,
            $model = 'library/location@show'
        );
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_location'    => request()->label_location, // harus lowercase
            'name_location'     => request()->name_location,
        ];

        $label = [];
        for ($i = 0; $i <= 39; $i++) {
            if ($i < 10) {
                $label[$i] = "L0{$i}";
            } else {
                $label[$i] = "L{$i}";
            }
        }

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|max:40|min:40',
            'label_location'    => 'required|in:' . implode(',', $label),
            'name_location'     => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation"
            ]);
        }

        $data = \TableLibraryLocationModel::whereUuid(request()->uuid);
        $update = $data->update($form);
        

        return Resolver([
            'payload'    => $data->first(),
            'credentials' => [
                'role'       => role(),
                // 'token'      => JWTToken(),
                'logged'     => logged(),
            ]
        ]);
    }

}
