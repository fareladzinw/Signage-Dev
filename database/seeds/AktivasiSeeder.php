<?php

use Illuminate\Database\Seeder;

class AktivasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aktivasi')->insert([
            [
                'user_id' => 1,
                'tanggal' => Carbon\Carbon::now(),
                'kode' => 'ABSKDLMZS',
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'tanggal' => Carbon\Carbon::now(),
                'kode' => 'ABS1DLMZS',
                'status' => 1,
            ],
        ]);
    }
}
