<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
            [
                'category_name' => 'Graduation Bouquet',
                'category_pic' => 'graduation.jpg',

            ],
            [
                'category_name' => 'Wedding Bouquet',
                'category_pic' => 'wedding.jpg',

            ],
            ]);
    }
}
