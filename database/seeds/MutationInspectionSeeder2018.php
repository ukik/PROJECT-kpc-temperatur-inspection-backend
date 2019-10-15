<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MutationInspectionSeeder2018

class MutationInspectionSeeder2018 extends Seeder
{
    use \EquipmentLocationStatic;
    use \TableMutationInspectionSchema;

    public
    function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('tb_mutation_inspection')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        $equipments = DB::table('tb_library_equipment')->get();
        $locations = DB::table('tb_library_location')->get();
        $employees = DB::table('tb_employee')->get();

        // var_dump($employees[mt_rand(0, count($employees))]->uuid);
        // return; 

        $screenshoots = [
            'https://i.pinimg.com/originals/e0/5f/64/e05f64d35f418ae491319cbd89f085b5.webp',
            'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/8f297256512097.59b16301a9a93.jpg',
            'https://cdn.dribbble.com/users/2160341/screenshots/6923554/daily_ui_--_006.png',
            'https://static.collectui.com/shots/3295600/international-travel-4-personal-large',
            'https://cdn.dribbble.com/users/212580/screenshots/2800485/untitled-1.jpg',
            'https://i.pinimg.com/originals/2f/6e/40/2f6e40c9bd5ef725de25eeb39611fb88.png',
        ];

        // $no = 0;

        $myinterval = 69;
        $mydate = "2018-10-23 00:00:00";

        $startDate = new Carbon\Carbon($mydate); //date("Y-m-d 00:00:00");
        // $stop_date = '2017-12-31 20:24:00';

        for ($i = 0; $i <= $myinterval; $i++) {

            $endDate = $startDate->addDays(1); //->format('Y-m-d h:i:s');
            // $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));

            // var_dump($endDate, $stop_date);

            $year = $endDate->format('Y');
            $month = $endDate->format('m');

            try {
                if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
                    $this->createDynamicTable("tb_mutation_inspection_{$year}_{$month}");
                }
            } catch (\Throwable $th) {
                //throw $th;
            }

            // var_dump($endDate->format('Y'));

            // sehari 2x data
            for ($q = 1; $q <= 2; $q++) {
                # code...

                foreach ($this->equipment as $key => $value) {
                    # code...

                    $eq = \DB::table('tb_library_equipment')->whereLabelEquipment($key);

                    foreach ($value as $key1 => $value1) {
                        # code...
                        $lc = \DB::table('tb_library_location')->whereLabelLocation($key1);


                        if ($value1[1] == 1) {

                            for ($p = 0; $p <= 1; $p++) {

                                $uuid =  "TIS-" . $faker->uuid;

                                $generated = [
                                    'uuid'                          => $uuid,
                                    'uuid_tb_inspection'            => $uuid,
                                    // 'no'                            => $no++,
                                    'uuid_tb_employee'              => $employees[mt_rand(0, count($employees) - 1)]->uuid,
                                    'uuid_tb_location'              => $lc->value('uuid'), //$locations[mt_rand(0, count($locations) - 1)]->uuid,
                                    'uuid_tb_equipment'             => $eq->value('uuid'), //$equipments[mt_rand(0, count($equipments) - 1)]->uuid,
                                    //'equipment_inspection'          => $eq, //$equipments[mt_rand(0, count($equipments) - 1)]->label_equipment,
                                    //'location_inspection'           => $location->name_location, //$locations[mt_rand(0, count($locations) - 1)]->label_location,
                                    'place_inspection'              => $p == 1 ? 'A' : 'B', //strval($value1[1]), //strval(mt_rand(0, 2)),
                                    'condition_inspection'          => strval(mt_rand(1, 3)),
                                    'grease_shoot_inspection'       => mt_rand(1, 100),
                                    'weather_inspection'            => strval(mt_rand(1, 6)),
                                    'temperature_inspection'        => mt_rand(0, 100),
                                    'rain_inspection'               => mt_rand(0, 100),
                                    'current_upnormal_inspection'   => strval(mt_rand(0, 1)),
                                    'last_upnormal_inspection'      => strval(mt_rand(0, 1)),
                                    'screenshoot_inspection'        => $screenshoots[mt_rand(0, 5)],
                                    'created_at'                    => $endDate,
                                ];

                                var_dump($generated);

                                DB::table("tb_mutation_inspection_{$year}_{$month}")->insert($generated);
                            }
                        } else {

                            $uuid =  "TIS-" . $faker->uuid;
                            $generated = [
                                'uuid'                          => $uuid,
                                'uuid_tb_inspection'            => $uuid,
                                // 'no'                            => $no++,
                                'uuid_tb_employee'              => $employees[mt_rand(0, count($employees) - 1)]->uuid,
                                'uuid_tb_location'              => $lc->value('uuid'), //$locations[mt_rand(0, count($locations) - 1)]->uuid,
                                'uuid_tb_equipment'             => $eq->value('uuid'), //$equipments[mt_rand(0, count($equipments) - 1)]->uuid,
                                //'equipment_inspection'          => $equipment->name_equipment, //$equipments[mt_rand(0, count($equipments) - 1)]->label_equipment,
                                //'location_inspection'           => $location->name_location, //$locations[mt_rand(0, count($locations) - 1)]->label_location,
                                'place_inspection'              => NULL, //strval($value1[1]), //strval(mt_rand(0, 2)),
                                'condition_inspection'          => strval(mt_rand(0, 2)),
                                'grease_shoot_inspection'       => mt_rand(1, 100),
                                'weather_inspection'            => strval(mt_rand(0, 5)),
                                'temperature_inspection'        => mt_rand(0, 100),
                                'rain_inspection'               => mt_rand(0, 100),
                                'current_upnormal_inspection'   => strval(mt_rand(0, 1)),
                                'last_upnormal_inspection'      => strval(mt_rand(0, 1)),
                                'screenshoot_inspection'        => $screenshoots[mt_rand(0, 5)],
                                'created_at'                    => $endDate,
                            ];

                            var_dump($generated);

                            DB::table("tb_mutation_inspection_{$year}_{$month}")->insert($generated);
                        }
                    }
                }
            }
        }
    }
}
