<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryScheduleController extends Controller
{
    use \TableLibraryScheduleValidator;
    // use \TableLibraryLocationSchema;

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

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true,
            $model = 'library/schedule@index'
        );
    }

    public function store(Request $request)
    {
        $this->librarLocationValidator($form);

        $data = \TableLibraryScheduleModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
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
            return fallback(
                $payload = $validator->messages()
            );
        }

        $data = \TableLibraryScheduleModel::whereUuid(request()->uuid);
        $data->update($form);

        return resolver(
            $request = $request,
            $payload = $data->first(),
            $auth = true,
            $model = 'library/schedule@update'
        );
    }

    // public function update(Request $request)
    // {
    //     $form =  [
    //         'uuid'              => request()->uuid,
    //         'label_location'   => request()->label_location,
    //         'name_location'    => request()->name_location,
    //     ];

    //     $this->librarLocationValidator($form);

    //     $data = \TableLibraryScheduleModel::findOrFail(request()->uuid)->update($form)->filterPaginate();

    //     return resolver($request = $request, $payload = $data, $auth = true);
    // }

    public function destroy(Request $request, $uuid)
    {
        \TableLibraryScheduleModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
