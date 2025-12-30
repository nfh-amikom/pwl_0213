<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Total Pemasukan (Kategori = Gaji)
        $totalPemasukan = Transaksi::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Gaji');
        })->sum('nominal');

        // Total Pengeluaran (Selain Gaji)
        $totalPengeluaran = Transaksi::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', '!=', 'Gaji');
        })->sum('nominal');

        // Saldo / Tabungan
        $saldo = $totalPemasukan - $totalPengeluaran;

        // return view('laporan.index', [
        //     'pemasukan'   => $totalPemasukan,
        //     'pengeluaran' => $totalPengeluaran,
        //     'saldo'       => $saldo,
        // ]);

        // ===== Bar Chart Mingguan =====
        $weekly = Transaksi::select(
            DB::raw('WEEK(tanggal, 1) - WEEK(DATE_SUB(tanggal, INTERVAL DAY(tanggal)-1 DAY), 1) + 1 as minggu'),
            DB::raw('SUM(nominal) as total')
        )
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->whereHas('kategori', function ($q) {
                $q->where('nama_kategori', '!=', 'Gaji');
            })
            ->groupBy('minggu')
            ->pluck('total', 'minggu');

        // Pastikan selalu ada Minggu 1–4
        $weeklyData = [
            $weekly[1] ?? 0,
            $weekly[2] ?? 0,
            $weekly[3] ?? 0,
            $weekly[4] ?? 0,
        ];

        return view('laporan.index', [
            'pemasukan'   => $totalPemasukan,
            'pengeluaran' => $totalPengeluaran,
            'saldo'       => $saldo,
            'weeklyData'  => $weeklyData,
        ]);
    }
}
