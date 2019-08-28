<?php

use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 13; $i++) {
            DB::table('paket')->insert([
                [
                    'nama' => 'dummy'.$i,
                    'harga' => 1000000,
                    'durasi' => 50,
                    'jumlahPlayer' => 1,
                    'jenisContent' => 1,
                    'startShow' => Carbon\Carbon::now(),
                    'endShow' => Carbon\Carbon::now(),
                    'jumlahFile' => 10,
                    'status' => 0,
                ]
            ]);
        }
    }
}
