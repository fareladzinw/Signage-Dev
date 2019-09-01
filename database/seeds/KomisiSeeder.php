<?php

use Illuminate\Database\Seeder;

class KomisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komisi')->insert([
            [
                'user_id' => 3,
                'tanggal' => Carbon\Carbon::now(),
                'afiliasiFrom' => 1,
                'persentase' => 50,
                'nominal' => 100000,
            ]
        ]);
    }
}
