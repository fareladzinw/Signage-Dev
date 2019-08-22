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
        DB::table('pesanan')->insert([
            [
                'paket_id' => 1,
                'user_id' => 1,
                'tanggal' => Carbon\Carbon::now(),
                'status' => 0,
                'startShow' => Carbon\Carbon::now(),
                'endShow' => Carbon\Carbon::now(),
            ]
        ]);
    }
}
