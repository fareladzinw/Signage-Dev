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
        DB::table('pembayaran')->insert([
            [
                'pesanan_id' => 1,
                'user_id' => 1,
                'tanggal' => Carbon\Carbon::now(),
                'harga' => 100000,
                'status' => 0,
                'urlFile' => 'dummy.com',
            ]
        ]);
    }
}
