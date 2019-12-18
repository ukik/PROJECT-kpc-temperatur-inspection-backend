<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=EmployeeSeeder

class EmployeeSeeder extends Seeder {

    public
    function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tb_employee')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\ Factory::create();

        $limit = 5;

        static $password;

        for ($i = 0; $i < $limit; $i++) {

            $startDate = new Carbon\Carbon('first day of October'); //date("Y-m-d 00:00:00");
            $endDate = new Carbon\Carbon("today");
            $randomDate = Carbon\Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->format('Y-m-d h:i:s');
    
            $generated = [
                "uuid"                  => "TEM-".$faker->uuid,
                "name_employee"         => $faker->name,
                "position_employee"     => strval(mt_rand(0, 1)+1),
                "nik_employee"          => rand(1000000000000000, 9999999999999999),
                "telpon_employee"       => $faker->e164PhoneNumber,
                "email_employee"        => $faker->unique()->safeEmail,
                "birth_place_employee"  => array_values(['samarinda','balikpapan','bontang'])[mt_rand(0, 2)],
                "birth_date_employee"   => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                "gender_employee"       => strval(mt_rand(0, 1)),
                "marital_employee"      => strval(mt_rand(0, 1)),
                "address_employee"      => $faker->address,
                "password_employee"     => 123456,
                "plain_password_employee" => 123456,
                "photo_employee"        => null,
                "verification_employee" => strval(1),             
                'created_at'            => $randomDate,
            ];

            var_dump($generated);

            DB::table('tb_employee')->insert($generated);
        }
    }
}
