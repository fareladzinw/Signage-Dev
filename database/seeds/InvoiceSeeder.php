<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice')->insert([
            [
                'transaksi_id' => 1,
                'user_id' => 1,
                'tanggal' => Carbon\Carbon::now(),
                'nominal' => 1000000,
                'total' => 1000000,
                'status' => 0,
            ]
        ]);
    }
}
