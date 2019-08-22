<?php

use Illuminate\Database\Seeder;

class WithdrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('withdraw')->insert([
            [
                'user_id' => 1,
                'tanggal' => Carbon\Carbon::now(),
                'nominal' => 1000000,
                'status' => 0,
            ]
        ]);
    }
}
