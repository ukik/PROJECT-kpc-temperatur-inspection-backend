<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableLibraryLocationController extends Controller
{
    use \TableLibraryLocationValidator;
    use \TableLibraryLocationSchema;

    public function index(Request $request)
    {

        // $data = null;
        switch (request()->type) {
            case "select":
                $data = \TableLibraryLocationModel::orderBy('no', 'asc')
                    ->select(['uuid', 'name_location'])
                    ->get();
                break;
            default:
                $data = \TableLibraryLocationModel::orderBy(request()->sortBy, request()->direction)
                    ->filterPaginate();
                break;
        }

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function store(Request $request)
    {
        $this->librarLocationValidator($form);

        $data = \TableLibraryLocationModel::create($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \TableLibraryLocationModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function update(Request $request)
    {
        $form =  [
            'uuid'              => request()->uuid,
            'label_location'   => request()->label_location,
            'name_location'    => request()->name_location,
        ];

        $this->librarLocationValidator($form);

        $data = \TableLibraryLocationModel::findOrFail(request()->uuid)->update($form)->filterPaginate();

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function destroy(Request $request, $uuid)
    {
        \TableLibraryLocationModel::findOrFail($uuid)->delete();

        return resolver($request = $request, $auth = true);
    }
}
