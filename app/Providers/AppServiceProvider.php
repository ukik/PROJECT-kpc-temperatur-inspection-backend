<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManagerStatic;

use TableEmployeeModel;
use TableLibraryEquipmentModel;
use TableLibraryLocationModel;
use TableMutationInspectionInformationModel;
use TableMutationInspectionModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Add-On: base 64 validator
        \Validator::extend('imageable', function ($attribute, $value, $params, $validator) {
            try {
                ImageManagerStatic::make($value);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        });

        TableEmployeeModel::observe(\TableEmployeeObserver::class);
        TableLibraryEquipmentModel::observe(\TableLibraryLocationObserver::class);
        TableLibraryLocationModel::observe(\TableLibraryEquipmentObserver::class);
        TableMutationInspectionModel::observe(\TableMutationInspectionObserver::class);
        TableMutationInspectionInformationModel::observe(\TableMutationInspectionInformationObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    { }
}
