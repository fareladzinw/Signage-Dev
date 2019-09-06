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
        for($i = 1; $i < 11; $i++) {
            DB::table('konfirmasi')->insert([
                [
                    'transaksi_id' => $i,
                    'type' => 1,
                    'konfirmasiDari' => 'dummy',
                    'tanggal' => Carbon\Carbon::now(),
                    'namaBank' => 'BCA',
                    'namaRekening' => 'dummy',
                    'nominal' => 1000000,
                    'status' => 0,
                    'validasi' => 0,
                    'dataBulb' => null,
                ]
            ]);
        }
    }
}
