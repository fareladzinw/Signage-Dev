<?php

use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {
            DB::table('pesanan')->insert([
                [
                    'paket_id' => $i,
                    'user_id' => 1,
                    'tanggal' => Carbon\Carbon::now(),
                    'status' => 0,
                    'startShow' => Carbon\Carbon::now(),
                    'endShow' => Carbon\Carbon::now(),
                ]
            ]);
        }
    }
}
