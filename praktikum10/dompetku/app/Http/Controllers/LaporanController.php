<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {

        // Hitung total saldo sederhana
        $totalPemasukan = 5000000;
        $totalPengeluaran = 375000;
        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('laporan.index', [
            'saldo' => $saldo,
            'pemasukan' => $totalPemasukan,
            'pengeluaran' => $totalPengeluaran,
        ]);
    }
}
