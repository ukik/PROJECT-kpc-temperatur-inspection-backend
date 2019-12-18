<?php

# dipakai oleh Model
trait EmployeeQueryBoot
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new EmployeeDisable);
    }
}

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EmployeeDisable implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        // query will result 
        # select * from `user` where `user`.`deleted_at` is null and `verification_employee` = ? 
        // $builder->whereStatus('enable'); 

        // query will result
        # select * from `user` where `user`.`deleted_at` is null and verification_employee = "1"

        $private = getter('private') ? true : false;
        if ($private) {
            $builder->whereRaw('disable_employee = "0" and verification_employee = "1"'); # memberikan default value pada query
        }
    }
}
