<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            [
                'file_id' => 1,
                'statusDownload' => 0,
            ]
        ]);
    }
}
