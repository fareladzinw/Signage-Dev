<?php

use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file')->insert([
            [
                'paket_id' => 1,
                'user_id' => 1,
                'pesanan_id' => 1,
                'nama' => 'user',
                'type' => 1,
                'size' => 69,
                'duration' => 69,
                'status' => 0,
                'url' => 'user.com',
            ]
        ]);
    }
}
