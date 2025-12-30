<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'keterangan' => 'Gaji Bulanan',
                'tanggal' => '2023-11-01',
                'nominal' => 5000000,
                'jenis' => 'pemasukan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'keterangan' => 'Belanja Bulanan',
                'tanggal' => '2023-11-02',
                'nominal' => 1500000,
                'jenis' => 'pengeluaran',
                'created_at' => now(),
                'updated_at' => now(),
            ]            
        ]);
    }
}
