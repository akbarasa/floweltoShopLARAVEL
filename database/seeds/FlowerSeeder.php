<?php

use Illuminate\Database\Seeder;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('flower')->insert([
            [
                'flower_name' => 'Oh Happy Day',
                'flower_pic' => 'ohhappyday.jpg',
                'category_id' => 1,
                'flower_price' => 120000,
                'flower_desc' => 'Classic arrangement - a combination of red and white roses. Suitable for both man and women.'

            ],
            [
                'flower_name' => 'New Journey',
                'flower_pic' => 'newjourney.jpg',
                'category_id' => 1,
                'flower_price' => 100000,
                'flower_desc' => "Combination of sweet and bright colours. Let's wish them a new journey to the next milestone of their life."
            ],
            [
                'flower_name' => 'Orange Marmalade',
                'flower_pic' => 'orangemarmalade.jpg',
                'category_id' => 1,
                'flower_price' => 80000,
                'flower_desc' => "Orange Gerbera means Sunshine of life. Let's wish them Congraduation with a bouquet of Orange Gerbera!"

            ],
            [
                'flower_name' => 'Graduation Special for Mix',
                'flower_pic' => 'graduationmix.jpg',
                'category_id' => 1,
                'flower_price' => 180000,
                'flower_desc' => "Beautifully Strung in a White Bouquet. The Right Choice to Celebrate Graduation Day"

            ],
            [
                'flower_name' => 'Happy Graduation',
                'flower_pic' => 'happygraduation.jpg',
                'category_id' => 1,
                'flower_price' => 95000,
                'flower_desc' => "Symbolizes Love, Passion, Beauty, Courage and Respect"
            ],
            [
                'flower_name' => 'Bessie',
                'flower_pic' => 'bessie.jpg',
                'category_id' => 2,
                'flower_price' => 180000,
                'flower_desc' => "The romantic soft color from white lily and peach rose together with the strong shades of purple make a perfect combination yet sweet for this arrangement"
            ],
            [
                'flower_name' => 'Triana',
                'flower_pic' => 'triana.jpg',
                'category_id' => 2,
                'flower_price' => 120000,
                'flower_desc' => "Better way to say love to someone on the special occasion with radiant red grand prix roses, calla lilies, and chrysanthemum"
            ],
            [
                'flower_name' => 'Amory',
                'flower_pic' => 'amory.jpg',
                'category_id' => 2,
                'flower_price' => 350000,
                'flower_desc' => "The uniqueness of eryngium combine with the pure of white roses perfect for any occassion"
            ],
            [
                'flower_name' => 'Delilah',
                'flower_pic' => 'delilah.jpg',
                'category_id' => 2,
                'flower_price' => 200000,
                'flower_desc' => "a pure beauty of scented white roses and tanacetum single veegmo"
            ],
            [
                'flower_name' => 'Romantic Roses',
                'flower_pic' => 'romanticrose.jpg',
                'category_id' => 2,
                'flower_price' => 180000,
                'flower_desc' => "A classic bouquet with romantic red roses wrapped with white korean paper and heart shape rattan"
            ],
        ]);
    }
}
