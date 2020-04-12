<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            // insert data ke table pegawai menggunakan Faker
            DB::table('mst_employee')
                ->insert([
                    'emp_id' => $faker->numerify('112####'),
                    'password' => bcrypt('12345678'),
                    'name' => $faker->name('male'),
                    'department' => 'BPC',
                    'company' => 'POSCO ICT INDONESIA',
                    'plant' => 'CCP',
                    'team' => 'PC',
                    'remember_token' => Str::random(60),
                    'level' => 0
                    // 'remember_token' => Str::random(50),
                ]);
        }
    }
}
