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
        DB::table('users')->insert([
            [
                'nama' => 'User1',
                'email' => 'User@gmail.com',
                'alamat' => 'Jln.User',
                'hp' => 12345,
                'tipeClient' => '1',
                'username' => 'user1',
                'password' => bcrypt('user1'),
                'dateTime' => Carbon::now(),
                'linkAfiliasi' => 'afiliasiuser',
                'jumlahAfiliasi' => 0,
                'namaBank' => 'BCA',
                'nomorRekening' => '1234567',
                'namaRekening' => 'User1'
            ],
            [
                'nama' => 'Admin1',
                'email' => 'Admin@gmail.com',
                'alamat' => 'Jln.Admin',
                'hp' => 12345,
                'tipeClient' => '2',
                'username' => 'admin1',
                'password' => bcrypt('admin1'),
                'dateTime' => Carbon::now(),
                'linkAfiliasi' => 'afiliasiAdmin',
                'jumlahAfiliasi' => 0,
                'namaBank' => 'BCA',
                'nomorRekening' => '1234567',
                'namaRekening' => 'Admin1'
            ]
        ]);
    }
}
