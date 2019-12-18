<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=LibraryLocationSeeder

class LibraryLocationSeeder extends Seeder {

    public
    function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_library_location')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\ Factory::create();

        // all letter convert to lowers
        $items = [
            'Auto Grease',
            'Bearing Breaker',
            'Bearing Drive End',
            'Bearing Non Drive End',
            'Bearing Timming Gear Drive End',
            'Bearing Timming Gear Non Drive End',
            'Bend pulley Atas',
            'Bend pulley Atas 1',
            'Bend pulley Atas 2',
            'Bend pulley Bawah',
            'Bend pulley Bawah 1',
            'Bend pulley Bawah 2',
            'Break Pulley',
            'Coller',
            'Coller 1',
            'Coller 2',
            'Coller 3',
            'Coller Gear Box',
            'F/Coupling',
            'G/Box',
            'G/Box 1',
            'G/Box 2',
            'G/Box 3',
            'G/Box Breaker',
            'G/Box Sizer',
            'Head Pulley',
            'Head Pulley 1',
            'Head Pulley 2',
            'Head Pulley 3',
            'Head Shaft',
            'HPP Pump',
            'Live Shaft Pulley',
            'Motor Feeder',
            'Pedestal bearing 1',
            'Pedestal bearing 2',
            'Pedestal bearing 3',
            'Snub Pulley',
            'Tail Pulley',
            'Tail Shaft',
            'Takeup Pulley',
        ];

        foreach ($items as $key => $item) {
            # code...

            $startDate = new Carbon\Carbon('first day of October'); //date("Y-m-d 00:00:00");
            $endDate = new Carbon\Carbon("today");
            $randomDate = Carbon\Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d h:i:s');

            $generated = [
                "uuid"                  => "TLL-".$faker->uuid,
                'label_location'        => "L".str_pad($key, 2, '0', STR_PAD_LEFT),
                'name_location'         => $item,
                'created_at'            => $randomDate,
            ];

            var_dump($generated);

            DB::table('tb_library_location')->insert($generated);
        }
    }
}