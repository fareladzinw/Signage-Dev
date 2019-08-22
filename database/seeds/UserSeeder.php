<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'nama' => 'User1',
                'email' => 'User@gmail.com',
                'alamat' => 'Jln.User',
                'hp' => 12345,
                'tipeClient' => '1',
                'username' => 'user1',
                'password' => 'user1',
                'dateTime' => Carbon::now(),
                'linkAfiliasi' => 'afiliasiuser',
                'jumlahAfiliasi' => 0,
                'namaBank' => 'BCA',
                'nomorRekening' => '1234567',
                'namaRekening' => 'User1'
            ]
        ]);
    }
}
