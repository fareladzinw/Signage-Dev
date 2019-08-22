<?php

use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request')->insert([
            [
                'player_id' => 1,
                'playlist_id' => 1,
                'tanggal' => Carbon\Carbon::now(),
                'status' => 0,
                'uniqueId' => '12345',
                'kapasitasFile' => 60,
                'estimateTransfer' => 60,
            ]
        ]);
    }
}
