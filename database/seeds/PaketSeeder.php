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
        DB::table('paket')->insert([
            [
                'nama' => 'dummy',
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
