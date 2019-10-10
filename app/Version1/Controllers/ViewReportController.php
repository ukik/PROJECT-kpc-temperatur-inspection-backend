<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewReportController extends Controller
{

    public function index(Request $request)
    {
        $data = null;
        try {
            $data = \ViewReportModel::orderBy(request()->sortBy, request()->direction)->filterPaginate();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return resolver($request = $request, $payload = $data, $auth = true);
    }

    public function show(Request $request, $uuid)
    {
        $data = \ViewReportModel::findOrFail($uuid)->first();

        return resolver($request = $request, $payload = $data, $auth = true);
    }
}
