<?php

Route::name('')->middleware([\Barryvdh\Cors\HandleCors::class, 'throttle:60,1', 'bindings'])->group(function () {

    Route::get('login', 'AuthController@login')->name('index');

    Route::apiResources([
        'library/equipment'                 => 'TableLibraryEquipmentController',
        'library/location'                  => 'TableLibraryLocationController',
        'mutation/inspection'               => 'TableMutationInspectionController',
        'mutation/inspection-information'   => 'TableMutationInspectionInformationController',
        'report/inspection'                 => 'ViewReportController',
    ]);

    Route::apiResource('employee', 'TableEmployeeController')->except(['store']);

    // Route::get('library/equipment', 'TableLibraryEquipmentController@index');
    // Route::get('library/location', 'TableLibraryLocationController@index');
});
