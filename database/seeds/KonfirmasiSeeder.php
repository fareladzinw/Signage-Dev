<?php

use Illuminate\Database\Seeder;

class KonfirmasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('konfirmasi')->insert([
            [
                'transaksi_id' => 1,
                'type' => 1,
                'konfirmasiDari' => 'dummy',
                'tanggal' => Carbon\Carbon::now(),
                'namaBank' => 'BCA',
                'namaRekening' => 'dummy',
                'nominal' => 1000000,
                'status' => 0,
                'validasi' => 0,
                'dataBulb' => 'dummy.jpg',
            ]
        ]);
    }
}
