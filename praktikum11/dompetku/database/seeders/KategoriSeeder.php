<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::insert([
            ['nama_kategori' => 'Makanan', 'deskripsi' => 'Pengeluaran makan'],
            ['nama_kategori' => 'Transportasi', 'deskripsi' => 'Biaya transport'],
            ['nama_kategori' => 'Gaji', 'deskripsi' => 'Pendapatan utama'],
            ['nama_kategori' => 'Hiburan', 'deskripsi' => 'Rekreasi & hiburan'],
            ['nama_kategori' => 'Tagihan', 'deskripsi' => 'Listrik, air, internet'],
        ]);
    }
}
