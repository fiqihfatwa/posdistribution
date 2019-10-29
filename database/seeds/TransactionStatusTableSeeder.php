<?php

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::create(['id' => '1', 'name' => 'Waiting Payment']);
        TransactionStatus::create(['id' => '2', 'name' => 'Waiting Confirmation']);
        TransactionStatus::create(['id' => '3', 'name' => 'Completed']);
        TransactionStatus::create(['id' => '4', 'name' => 'Cancel']);
    }
}
