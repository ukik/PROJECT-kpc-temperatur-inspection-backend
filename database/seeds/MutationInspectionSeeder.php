<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MutationInspectionSeeder

class MutationInspectionSeeder extends Seeder
{

    public
    function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_mutation_inspection')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        $limit = 5;

        static $password;

        $equipments = DB::table('tb_library_equipment')->get();
        $locations = DB::table('tb_library_location')->get();
        $employees = DB::table('tb_employee')->get();

        // var_dump($employees[mt_rand(0, count($employees))]->uuid);
        // return; 

        for ($i = 0; $i < 100; $i++) {

            foreach ($equipments as $key => $equipment) {

                $startDate = new Carbon\Carbon('2017-01-01'); //date("Y-m-d 00:00:00");
                $endDate = new Carbon\Carbon("today");
                $randomDate = Carbon\Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d h:i:s');

                $generated = [
                    'uuid'                          => "TIS-" . $faker->uuid,

                    'uuid_tb_employee'              => $employees[mt_rand(0, count($employees) - 1)]->uuid,
                    'uuid_tb_location'              => $locations[mt_rand(0, count($locations) - 1)]->uuid,
                    'uuid_tb_equipment'              => $equipments[mt_rand(0, count($equipments) - 1)]->uuid,
                    //'equipment_inspection'          => $equipments[mt_rand(0, count($equipments) - 1)]->label_equipment,
                    //'location_inspection'           => $locations[mt_rand(0, count($locations) - 1)]->label_location,
                    'place_inspection'              => strval(mt_rand(0, 2)),
                    'condition_inspection'          => strval(mt_rand(0, 2)),
                    'grease_shoot_inspection'       => mt_rand(1, 100),
                    'weather_inspection'            => strval(mt_rand(0, 5)),
                    'temperature_inspection'        => mt_rand(0, 100),
                    'rain_inspection'               => mt_rand(0, 100),
                    'current_upnormal_inspection'   => strval(mt_rand(0, 1)),
                    'last_upnormal_inspection'      => strval(mt_rand(0, 1)),
                    'screenshoot_inspection'        => null,
                    'created_at'                => $randomDate,
                ];

                var_dump($generated);

                DB::table('tb_mutation_inspection')->insert($generated);
            }
        }
    }
}
