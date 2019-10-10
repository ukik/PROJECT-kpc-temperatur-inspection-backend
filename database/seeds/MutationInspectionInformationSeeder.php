<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MutationInspectionInformationSeeder

class MutationInspectionInformationSeeder extends Seeder
{

    public
    function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_mutation_inspection_information')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();


        $mutation_inspections = DB::table('tb_mutation_inspection')->get();

        foreach ($mutation_inspections as $key => $mutation) {
            # code...
            $generated = null;

            switch ($mutation->current_upnormal_inspection) {
                case '1':
                case 1:

                    $generated = [
                        "uuid"                                  => "TIF-" . $faker->uuid,
                        'uuid_tb_inspection'                    => $mutation_inspections[mt_rand(0, count($mutation_inspections) - 1)]->uuid,
                        'label_inspection_information'          => 'cui',
                        'description_inspection_information'    => $faker->text,
                        'created_at'                            => $mutation->created_at,
                    ];

                    var_dump($generated);

                    DB::table('tb_mutation_inspection_information')->insert($generated);

                    # code...
                    break;
            }

            switch ($mutation->last_upnormal_inspection) {
                case '1':
                case 1:

                    $generated = [
                        "uuid"                                  => "TIF-" . $faker->uuid,
                        'uuid_tb_inspection'                    => $mutation_inspections[mt_rand(0, count($mutation_inspections) - 1)]->uuid,
                        'label_inspection_information'          => 'lui',
                        'description_inspection_information'    => $faker->text,
                        'created_at'                            => $mutation->created_at,
                    ];

                    var_dump($generated);

                    DB::table('tb_mutation_inspection_information')->insert($generated);

                    # code...
                    break;
            }

            if(mt_rand(0,1) == 1) {
                $generated = [
                    "uuid"                                  => "TIF-" . $faker->uuid,
                    'uuid_tb_inspection'                    => $mutation_inspections[mt_rand(0, count($mutation_inspections) - 1)]->uuid,
                    'label_inspection_information'          => 'com',
                    'description_inspection_information'    => $faker->text,
                    'created_at'                            => $mutation->created_at,
                ];

                var_dump($generated);

                DB::table('tb_mutation_inspection_information')->insert($generated);                
            }
        }
    }
}
