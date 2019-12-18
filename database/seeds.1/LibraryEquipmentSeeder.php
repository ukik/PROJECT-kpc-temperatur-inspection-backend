<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=LibraryEquipmentSeeder

class LibraryEquipmentSeeder extends Seeder {

    public
    function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_library_equipment')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\ Factory::create();

        // all letter convert to lowers
        $items = [
            'CV.101',
            'CV.111',
            'CV.112',
            'CV.113',
            'CV.114',
            'CV.115',
            'CV.116',
            'FB 7',
            'FB 8',
            'Sizer 7',
            'Sizer 8',
        ];

        foreach ($items as $key => $item) {
            # code...

            $startDate = new Carbon\Carbon('first day of October'); //date("Y-m-d 00:00:00");
            $endDate = new Carbon\Carbon("today");
            $randomDate = Carbon\Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d h:i:s');

            $generated = [
                "uuid"                  => "TLE-".$faker->uuid,
                'label_equipment'        => "E".str_pad($key, 2, '0', STR_PAD_LEFT),
                'name_equipment'         => $item,
                'created_at'            => $randomDate,
            ];

            var_dump($generated);

            DB::table('tb_library_equipment')->insert($generated);
        }
    }
}