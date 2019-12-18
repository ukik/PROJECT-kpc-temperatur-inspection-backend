<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryLocationController extends Controller
{
    use \TableLibraryLocationValidator;
    // use \TableLibraryLocationSchema;

    public function index(Request $request)
    {
        switch (request()->type) {
            case "select":
                $data = \TableLibraryLocationModel::orderBy('no', 'asc')
                    ->select(['uuid', 'name_location'])
                    ->get();
                break;
            default:
                $direction = request()->direction == null ? 'desc' : request()->direction;
                $data = \TableLibraryLocationModel::orderBy('label_location', $direction)
                    ->filterPaginate();
                break;
        }

        return resolver(
            $request = $request,
            $payload = $data,
            $auth = true,
            $model = 'library/location@index'
        );
    }

    public function store(Request $request)
    {
        $this->librarLocationValidator($form);

        $data = \TableLibraryLocationModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
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

        // return resolve([
        //     $payload    = $data,
        //     $role       = Auth::user()->position_employee,
        //     $token      = JWTRefresh(),
        //     $auth       = true,
        // ]);
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
            return fallback(
                $payload = $validator->messages()
            );
        }

        $data = \TableLibraryLocationModel::whereUuid(request()->uuid);
        $data->update($form);

        return resolver(
            $request = $request,
            $payload = $data->first(),
            $auth = true,
            $model = 'library/location@update'
        );
    }

    public function destroy(Request $request, $uuid)
    {
        \TableLibraryLocationModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
