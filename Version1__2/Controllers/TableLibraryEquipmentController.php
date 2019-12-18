<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryEquipmentController extends Controller
{

    public function index(Request $request)
    {

		switch (request()->type) {
			case "select":
				$data = \TableLibraryEquipmentModel::orderBy('no', 'asc')
					->select(['uuid', 'name_equipment', 'label_equipment'])
					->get();
				break;
			default:
				$direction = request()->direction == null ? 'desc' : request()->direction;
				$data = \TableLibraryEquipmentModel::orderBy(request()->sortBy, $direction)
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


    public function update(Request $request)
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_equipment'   => request()->label_equipment, // harus lowercase
            'name_equipment'    => request()->name_equipment,
        ];

        $label = [];
        for ($i = 0; $i <= 10; $i++) {
            if ($i < 10) {
                $label[$i] = "E0{$i}";
            } else {
                $label[$i] = "E{$i}";
            }
        }

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|max:40|min:40',
            'label_equipment'   => 'required|in:' . implode(',', $label),
            'name_equipment'    => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation"
            ]);
        }

        $data = \TableLibraryEquipmentModel::whereUuid(request()->uuid);
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
