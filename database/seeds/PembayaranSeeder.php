<?php

use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {
            DB::table('pembayaran')->insert([
                [
                    'pesanan_id' => $i,
                    'user_id' => 1,
                    'tanggal' => Carbon\Carbon::now(),
                    'harga' => 100000,
                    'status' => 0,
                    'urlFile' => 'dummy.com',
                ]
            ]);
        }
    }
}
