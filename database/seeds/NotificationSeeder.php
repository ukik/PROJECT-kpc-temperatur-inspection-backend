<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=NotificationSeeder

class NotificationSeeder extends Seeder {

    public
    function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('notifications')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		
		$repeat = 20;
		
		$users = DB::table('tb_employee')->get();
		$inspections = DB::table('tb_mutation_inspection_2018_01')->get();
		
		//setter('tag', '0');		
		
		/*
        for ($i = 0; $i < $repeat; $i++) {		
			foreach($users as $key => $user){
				$data = \TableEmployeeModel::where('uuid', $user->uuid)->first();
				$data->notify(new \NewEmployeeNotification($user));
			}
			var_dump($i);
		}
		*/
	
		foreach($inspections as $key => $inspection){
			var_dump($inspection);
			$data = \TableEmployeeModel::where('uuid', $inspection->uuid_tb_employee)->first();
			$data->notify(new \NewInspectionNotification($inspection));
		}
		
    }
}
