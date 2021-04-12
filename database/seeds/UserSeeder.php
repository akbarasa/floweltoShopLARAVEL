<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'username' => 'Nasi Hainam',
                'userPosition' => 'manager',
                'email' => 'manager@binus.ac.id',
                'password' => bcrypt('manager'),
                'dob' => '11/11/1111',
                'gender' => 'Male',
                'useradd' => 'Bukan jalan pagi, tapi jalan sendiri',

            ],
            [
                'username' => 'Nasi Goreng',
                'userPosition' => 'customer',
                'email' => 'customer@binus.ac.id',
                'password' => bcrypt('customer'),
                'dob' => '22/02/1922',
                'gender' => 'Female',
                'useradd' => 'Jalan - Jalan sama kamu',

            ],
            ]);
    }
}
