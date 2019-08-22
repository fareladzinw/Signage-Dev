<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UserSeeder::class,
             AktivasiSeeder::class,
             PaketSeeder::class,
             PesananSeeder::class,
             PembayaranSeeder::class,
             FileSeeder::class,
             KomisiSeeder::class,
             WithdrawSeeder::class,
             PlayerSeeder::class,
             LayoutSeeder::class,
             MediaSeeder::class,
             KategoriSeeder::class,
             PlaylistSeeder::class,
             TransaksiSeeder::class,
             InvoiceSeeder::class,
             EmailSeeder::class,
             KonfirmasiSeeder::class,
             ContentSeeder::class,
             RequestSeeder::class,
         ]);
    }
}
