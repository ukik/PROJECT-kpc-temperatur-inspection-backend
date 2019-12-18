<?php

 Route::get('notifications', function () {
//	 return request();
 return \ViewMutationInspectionModel::first()->tb_mutation_inspection;
    //return \ViewNotificationModel::select('employee', 'inspection')->first();
 });

Route::name('public')->middleware([\Barryvdh\Cors\HandleCors::class, 'throttle:60,1', 'bindings'])->group(function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('logout', 'AuthController@logout');
    Route::post('forget', 'AuthController@forget');
    Route::post('re-verification', 'AuthController@verification');

});
Route::name('private')->middleware([\Barryvdh\Cors\HandleCors::class, 'throttle:60,1', 'bindings', 'jwt.recycle'])->group(function () {

    Route::get('init', 'InitController@index')->name('.init.index');

    Route::get('report/inspection', 'ViewReportController@index')->name('.report.inspection.index');

    Route::get('employee', 'TableEmployeeController@index')->name('.employee.index');
    Route::put('employee', 'TableEmployeeController@update')->name('.employee.update');
    Route::post('employee', 'TableEmployeeController@store')->name('.employee.store');

    Route::get('library/equipment', 'TableLibraryEquipmentController@index')->name('.mutation.equipment.index');
    Route::put('library/equipment', 'TableLibraryEquipmentController@update')->name('.mutation.equipment.update');

    Route::get('library/location', 'TableLibraryLocationController@index')->name('.mutation.location.index');
    Route::put('library/location', 'TableLibraryLocationController@update')->name('.mutation.location.update');

    Route::get('library/equipment-location', 'ViewLibraryEquipmentLocationController@index')->name('.mutation.equipment.location.index');

    Route::get('library/schedule', 'TableLibraryScheduleController@index')->name('.mutation.schedule.index');
    Route::put('library/schedule', 'TableLibraryScheduleController@update')->name('.mutation.schedule.update');

    Route::get('mutation/inspection', 'TableMutationInspectionController@index')->name('.mutation.inspection.index');
    Route::post('mutation/inspection', 'TableMutationInspectionController@store')->name('.mutation.inspection.store');
    Route::put('mutation/inspection', 'TableMutationInspectionController@update')->name('.mutation.inspection.update');
    Route::put('mutation/inspection/validation', 'TableMutationInspectionController@validation')->name('.mutation.inspection.validation');
});
