<?php

use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('player')->insert([
            [
                'nama' => 'dummyPlayer',
                'lokasi' => 'dummy',
                'KEYPLAYER' => 'DUMMY PLAYER',
                'PASSWORD' => 'passworddummy',
                'spesifikasi' => 'dummy',
            ]
        ]);
    }
}
