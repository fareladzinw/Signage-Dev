<?php

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {
            DB::table('transaksi')->insert([
                [
                    'user_id' => 1,
                    'paket_id' => $i,
                    'pesanan_id' => $i,
                    'jumlahPesanan' => 1,
                    'tanggal' => Carbon\Carbon::now(),
                    'nominal' => 100000,
                    'discount' => 0,
                    'total' => 100000,
                    'statusUpload' => 0,
                    'statusTayang' => 0,
                ]
            ]);
        }
    }
}
