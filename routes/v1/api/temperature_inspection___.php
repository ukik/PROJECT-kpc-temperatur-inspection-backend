<?php

Route::name('')->group(function () {

    Route::get('login', 'AuthController@login');

    
    Route::apiResource('employee', 'EmployeeController');
    Route::apiResource('library/equipment', 'LibraryEquipmentController');
    Route::apiResource('library/location', 'LibraryLocationController');
    Route::apiResource('mutation/inspection', 'MutationInspectionController');
    Route::apiResource('mutation/inspection/information', 'MutationInspectionInformationController');

});
