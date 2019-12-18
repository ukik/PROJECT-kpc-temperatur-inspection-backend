<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MutationInspectionUpdateSeeder

class MutationInspectionUpdateSeeder extends Seeder
{
    use \EquipmentLocationStatic;
    use \TableMutationInspectionSchema;
    use \TableMutationInspectionInformationSchema;
    use \ViewMutationInspectionSchema;

    public function generateTable($year, $month)
    {
        $minYear = 2017;

        if($year < $minYear || $year > date('Y')){
            return;
        }      
    
        // check "tb_mutation_inspection_{$year}_{$month}"
        // jika tidak ada maka dibuat
        if(!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
            $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
        }
        if(!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
            $this->createDynamicTableMutationInspectionInformationSchema("tb_mutation_inspection_information_{$year}_{$month}");
        }
        
        if (!ifViewExist("vw_mutation_inspection_{$year}_{$month}")) {
            // fresh create berdasarkan current Date

            $this->createDynamicViewMutationInspectionSchema("vw_mutation_inspection_{$year}_{$month}", "_{$year}_{$month}");
        } 

        return;
    }


    public
    function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_mutation_inspection_pivot')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        $container = [];

        $myinterval1 = 40;
        $mydate1 = "2017-01-00 00:00:00";
        $startDate1 = new Carbon\Carbon($mydate1); //date("Y-m-d 00:00:00");

        for ($t = 0; $t <= $myinterval1; $t++) {

            $endDate1 = $startDate1->addMonths(1); //->format('Y-m-d h:i:s');

            $year1 = $endDate1->format('Y');
            $month1 = $endDate1->format('m');

            // mengambil data dari tabel utama
            $this->generateTable($year1, $month1);

            if(ifTableExist("tb_mutation_inspection_{$year1}_{$month1}")) {
                $mydata = \DB::table("tb_mutation_inspection_{$year1}_{$month1}")->limit(10)->get();
                foreach ($mydata as $key => $value) {
                    array_push($container, $value);
                }
            }
        }


        $schedule = \DB::table('tb_library_schedule')->get();

        foreach ($container as $key => $value) {

            foreach ($schedule as $key2 => $value2) {

                $uuid =  "TIU-" . $faker->uuid;

                // dd($value->uuid_tb_inspection);
                // dd($value2);

                $generated = [
                    'uuid'                        => $uuid,
                    'uuid_tb_inspection'          => $value->uuid_tb_inspection,
                    'uuid_tb_employee'            => $value->uuid_tb_employee,
                    'uuid_tb_schedule'            => $value2->uuid,
                    'uuid_tb_location'            => $value->uuid_tb_location,
                    'uuid_tb_equipment'           => $value->uuid_tb_equipment,
                    'place_inspection'            => $value->place_inspection,
                    'condition_inspection'        => $value->condition_inspection == "" ? NULL : $value->condition_inspection,
                    'grease_shoot_inspection'     => $value->grease_shoot_inspection,
                    'weather_inspection'          => $value->weather_inspection == "" ? 6 : $value->weather_inspection,
                    'temperature_inspection'      => $value->temperature_inspection,
                    'rain_inspection'             => $value->rain_inspection,
                    'current_upnormal_inspection' => $value->current_upnormal_inspection,
                    'last_upnormal_inspection'    => $value->last_upnormal_inspection,
                    'screenshoot_inspection'      => $value->screenshoot_inspection,
                    'created_at'                  => $value->created_at,
                ];

                var_dump($generated);

                DB::table("tb_mutation_inspection_pivot")->insert($generated);

            }

        }

        // dd(count($container), $container);

    }
}
