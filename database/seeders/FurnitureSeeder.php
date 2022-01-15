<?php

namespace Database\Seeders;

use App\Models\Furniture;
use Illuminate\Database\Seeder;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $furniture = [
            [
                'name' => 'White Chair',
                'price' => '798000',
                'type' => 'Chair',
                'color' => 'White',
                'image' => '1641697913.jpg',
            ],
            [
                'name' => 'Own Bed',
                'price' => '1989000',
                'type' => 'Bed',
                'color' => 'White',
                'image' => '1641697825.jpg',
            ],
            [
                'name' => 'Floor Sleep',
                'price' => '2100000',
                'type' => 'Chair',
                'color' => 'Black',
                'image' => '1641697729.jpg',
            ],
            [
                'name' => 'Double bed',
                'price' => '2923000',
                'type' => 'Bed',
                'color' => 'White',
                'image' => '1641697632.jpg',
            ],
            [
                'name' => 'Spacious Soga',
                'price' => '2300000',
                'type' => 'Sofa',
                'color' => 'Black',
                'image' => '1641697547.jpg',
            ],
            [
                'name' => 'Storage Table',
                'price' => '710000',
                'type' => 'Table',
                'color' => 'Pink',
                'image' => '1641697387.jpg',
            ],
            [
                'name' => 'Black Small Tab',
                'price' => '700000',
                'type' => 'Table',
                'color' => 'Black',
                'image' => '1641697306.jpg',
            ],
            [
                'name' => 'Jar White Chair',
                'price' => '1200000',
                'type' => 'Table',
                'color' => 'White',
                'image' => '1641697212.jpg',
            ],

        ];
        foreach ($furniture as $key => $value){
            Furniture::create($value);
        }
    }
}
