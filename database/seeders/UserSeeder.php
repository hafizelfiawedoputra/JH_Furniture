<?php

namespace Database\Seeders;

use App\Models\User;
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
        $transaction = [
            [
                'name' => 'Admin',
                'email' => 'admin@bluejack.com',
                'password' => bcrypt('123456'),
                'address' => 'Jl. Jalur Sutera Barat Panunggangan Timur',
                'gender' => 'Male',
                'kategori' => '1',
            ],
            [
                'name' => 'Hafiz Elfia',
                'email' => 'hafiz.putra@binus.ac.id',
                'password' => bcrypt('123456'),
                'address' => 'Rahayu Resudence No. 02 Serang Banten',
                'gender' => 'Male',
            ],
            [
                'name' => 'Enji',
                'email' => 'enjicantik@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Jl. Jalur Sutera Bar. No.Kav 15',
                'gender' => 'Female',
            ],
        ];
        foreach ($transaction as $key => $value){
            User::create($value);
        }
    }
}
