<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryScheduleController extends Controller
{
    public function index(Request $request)
    {

		switch (request()->type) {
			case "select":
				$data = \TableLibraryScheduleModel::orderBy('no', 'asc')
					->get();
				break;
			default:
				$direction = request()->direction == null ? 'desc' : request()->direction;
				$data = \TableLibraryScheduleModel::orderBy(request()->sortBy, $direction)
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
        $data = \TableLibraryScheduleModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'                  => request()->uuid,
            'label_schedule'        => request()->label_schedule,
            'starttime_schedule'    => request()->starttime_schedule,
            'endtime_schedule'      => request()->endtime_schedule,
        ];

        $label = ['shift a', 'shift b', 'shift c'];

        $validator = \Validator::make($form, [
            'uuid'              => 'required|string|max:40|min:40',
            'label_schedule'    => 'required|in:' . implode(',', $label),
            'starttime_schedule'    => 'required',
            'endtime_schedule'      => 'required',
        ]);

        if ($validator->fails()) {
            return Resolver([
                'payload'   => $validator->messages(),
                'status'    => "validation"
            ]);
        }

        $data = \TableLibraryScheduleModel::whereUuid(request()->uuid);
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
