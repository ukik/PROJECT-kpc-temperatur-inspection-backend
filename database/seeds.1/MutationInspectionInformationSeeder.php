<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MutationInspectionInformationSeeder

class MutationInspectionInformationSeeder extends Seeder
{
    use \ViewReportSchema;
    use \ViewMutationInspectionSchema;
    use \TableMutationInspectionSchema;
    use \TableMutationInspectionInformationSchema;

    public
    function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('tb_mutation_inspection_information')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        $myinterval = 31;
        $mydate = "2017-12-30 00:00:00";

        $startDate = new Carbon\Carbon($mydate); //date("Y-m-d 00:00:00");

        for ($i = 1; $i <= $myinterval; $i++) {

            $endDate = $startDate->addMonths(1);
            $year = $endDate->format('Y');
            $month = $endDate->format('m');

            var_dump($year, $month);
            if ($month > date('m') && $year > date('Y')) {
                return;
                break;
            }

            # make dynamic vw_report_{year}_{month}
            try {
                if (!ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {
                    $this->createDynamicTableMutationInspectionSchema("tb_mutation_inspection_{$year}_{$month}");
                }

                // if (!ifViewExist("vw_mutation_inspection_{$year}_{$month}")) {
                //     $this->createDynamicViewReportSchema("vw_mutation_inspection_{$year}_{$month}", "_{$year}_{$month}");
                // }
            } catch (\Throwable $th) {
                //throw $th;
            }

            // dd(\DB::statement("SHOW TABLES LIKE 'vw_report_{$year}_{$month}'"), ifTableExist("tb_mutation_inspection_{$year}_{$month}"));

            # load dynamic vw_report_{year}_{month}
            // try {
            if (\DB::statement("SHOW TABLES LIKE 'vw_report_{$year}_{$month}'")) {

                if (!ifTableExist("tb_mutation_inspection_information_{$year}_{$month}")) {
                    $this->createDynamicTableMutationInspectionInformationSchema("tb_mutation_inspection_information_{$year}_{$month}", "tb_mutation_inspection_{$year}_{$month}");
                }

                if (ifTableExist("tb_mutation_inspection_{$year}_{$month}")) {

                    $mutation_inspections = DB::table("tb_mutation_inspection_{$year}_{$month}")->get();


                    foreach ($mutation_inspections as $key => $mutation) {
                        # code...
                        $generated = null;

                        switch ($mutation->current_upnormal_inspection) {
                            case '1':
                            case 1:

                                $generated = [
                                    "uuid"                                  => "TIF-" . $faker->uuid,
                                    'uuid_tb_inspection'                    => $mutation->uuid, //$mutation_inspections[mt_rand(0, count($mutation_inspections) - 1)]->uuid,
                                    'label_inspection_information'          => 'cui',
                                    'description_inspection_information'    => $faker->text,
                                    'created_at'                            => $mutation->created_at,
                                ];

                                // var_dump($generated);

                                DB::table("tb_mutation_inspection_information_{$year}_{$month}")->insert($generated);

                                # code...
                                break;
                        }

                        switch ($mutation->last_upnormal_inspection) {
                            case '1':
                            case 1:

                                $generated = [
                                    "uuid"                                  => "TIF-" . $faker->uuid,
                                    'uuid_tb_inspection'                    =>  $mutation->uuid, //$mutation_inspections[mt_rand(0, count($mutation_inspections) - 1)]->uuid,
                                    'label_inspection_information'          => 'lui',
                                    'description_inspection_information'    => $faker->text,
                                    'created_at'                            => $mutation->created_at,
                                ];

                                // var_dump($generated);

                                DB::table("tb_mutation_inspection_information_{$year}_{$month}")->insert($generated);

                                # code...
                                break;
                        }

                        if (mt_rand(0, 1) == 1) {
                            $generated = [
                                "uuid"                                  => "TIF-" . $faker->uuid,
                                'uuid_tb_inspection'                    =>  $mutation->uuid, //$mutation_inspections[mt_rand(0, count($mutation_inspections) - 1)]->uuid,
                                'label_inspection_information'          => 'com',
                                'description_inspection_information'    => $faker->text,
                                'created_at'                            => $mutation->created_at,
                            ];

                            // var_dump($generated);

                            DB::table("tb_mutation_inspection_information_{$year}_{$month}")->insert($generated);
                        }
                    }
                }
            }
            // } catch (\Throwable $th) {
            //     //throw $th;
            // }                    
        }
    }
}
