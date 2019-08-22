<?php

use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlist')->insert([
            [
                'player_id' => 1,
                'media_id' => 1,
                'layout_id' => 1,
                'kategori_id' => 1,
                'paket_id' => 1,
                'duration' => 60,
                'statusLoop' => 0,
                'statusMedia' => 0,
            ]
        ]);
    }
}
