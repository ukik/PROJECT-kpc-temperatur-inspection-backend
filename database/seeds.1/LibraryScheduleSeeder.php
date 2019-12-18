<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=LibraryScheduleSeeder

class LibraryScheduleSeeder extends Seeder {

    public
    function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_library_schedule')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\ Factory::create();

        // all letter convert to lowers
        $items = [
            'shift a',
            'shift b',
            'shift c',
        ];

        $starttime = [
            '08:00:00',
            '16:00:00',
            '23:00:00',
        ];

        $endtime = [
            '17:00:00',
            '00:00:00',
            '07:00:00',
        ];        

        foreach ($items as $key => $item) {
            # code...

            $startDate = new Carbon\Carbon('first day of October'); //date("Y-m-d 00:00:00");
            $endDate = new Carbon\Carbon("today");
            $randomDate = Carbon\Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d h:i:s');

            $generated = [
                // 'no'              => "TLS-".$faker->uuid,
                'uuid'                  => "TLS-".$faker->uuid,
                'label_schedule'        => $item,
                'starttime_schedule'    => $starttime[$key],
                'endtime_schedule'      => $endtime[$key],
                'created_at'            => $randomDate,
            ];

            var_dump($generated);

            DB::table('tb_library_schedule')->insert($generated);
        }
    }
}