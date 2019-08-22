<?php

use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email')->insert([
            [
                'invoice_id' => 1,
                'user_id' => 1,
                'status' => 0,
                'emailTujuan' => 'user1@email.com',
                'subject' => 'emailsubject',
                'pesan' => 'emailmessage',
                'tanggalKirim' => Carbon\Carbon::now(),
            ]
        ]);
    }
}
