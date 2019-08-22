<?php

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content')->insert([
            [   
                'transaksi_id' => 1,
                'paket_id' => 1,
                'playlist_id' => 1,
                'user_id' => 1,
                'status' => 0,
                'startTayang' => Carbon\Carbon::now(),
                'endTayang' => Carbon\Carbon::now(),
                'numberFile' => '69',
                'typeFile' => 1,
                'urlFile' => 'trial.arbasignage.com/dummy',
                'orderFile' => 111,
            ]
        ]);
    }
}
