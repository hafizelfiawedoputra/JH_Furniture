<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
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
                'user_id' => '2',
                'method' => 'Credit',
                'id_card' => '3498472100098213',
            ],
            [
                'user_id' => '2',
                'method' => 'Debit',
                'id_card' => '3498472100098213',
            ],
            [
                'user_id' => '3',
                'method' => 'Debit',
                'id_card' => '3498472123898431',
            ],
            [
                'user_id' => '3',
                'method' => 'Credit',
                'id_card' => '3498472123898431',
            ],
        ];
        foreach ($transaction as $key => $value){
            Transaction::create($value);
        }
    }


}
