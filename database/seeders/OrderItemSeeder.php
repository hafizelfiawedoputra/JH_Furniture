<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
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
                'transaction_id' => '1',
                'prod_id' => '7',
                'prod_qty' => '1',
                'price' => '700000',
            ],
            [
                'transaction_id' => '1',
                'prod_id' => '1',
                'prod_qty' => '2',
                'price' => '798000',
            ],
            [
                'transaction_id' => '2',
                'prod_id' => '8',
                'prod_qty' => '1',
                'price' => '1200000',
            ],
            [
                'transaction_id' => '2',
                'prod_id' => '1',
                'prod_qty' => '1',
                'price' => '798000',
            ],
            [
                'transaction_id' => '3',
                'prod_id' => '3',
                'prod_qty' => '1',
                'price' => '2100000',
            ],
            [
                'transaction_id' => '3',
                'prod_id' => '4',
                'prod_qty' => '1',
                'price' => '2923000',
            ],
            [
                'transaction_id' => '4',
                'prod_id' => '5',
                'prod_qty' => '1',
                'price' => '2300000',
            ],
        ];
        foreach ($transaction as $key => $value){
            OrderItem::create($value);
        }
    }
}
