<?php

use Illuminate\Database\Seeder;

class LayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('layout')->insert([
            [                
                'nama' => 'dummy',
                'width' => 1280,
                'height' => 960,
                'statusFullscreen' => 0,
                'orientation' => 1,
            ]
        ]);
    }
}
