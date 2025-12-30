<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan halaman Dashboard
    public function index(Request $request)
    {
        if ($request->has('search') && trim($request->search) === '') {
            return redirect()->route('transaksi.index');
        }
        $search = $request->search;

        // 1. Mengambil data dari Database, diurutkan dari yang terbaru
        $transaksi = Transaksi::when($search, function ($query, $search) {
            $query->where('keterangan', 'like', '%' . $search . '%');
        })->orderBy('tanggal', 'desc')->paginate(10)->withQueryString();
        // 2. Menghitung total Pemasukan & Pengeluaran menggunakan Agregat Database
        // Ini lebih efisien daripada menghitung manual dengan loop
        // $totalPemasukan = Transaksi::where(
        //     'jenis',
        //     'pemasukan'
        // )->sum('nominal');
        // $totalPengeluaran = Transaksi::where(
        //     'jenis',
        //     'pengeluaran'
        // )->sum('nominal');

        // 💰 Total Pemasukan (Kategori = Gaji)
        $totalPemasukan = Transaksi::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', 'Gaji');
        })->sum('nominal');

        // 💸 Total Pengeluaran (Selain Gaji)
        $totalPengeluaran = Transaksi::whereHas('kategori', function ($q) {
            $q->where('nama_kategori', '!=', 'Gaji');
        })->sum('nominal');
        // 3. Menghitung Saldo Akhir
        $saldo = $totalPemasukan - $totalPengeluaran;
        // 4. Mengirim data ke View
        return view('transaksi.index', [
            'dataTransaksi' => $transaksi,
            'pemasukan' => $totalPemasukan,
            'pengeluaran' => $totalPengeluaran,
            'saldo' => $saldo
        ]);
    }

    // Menampilkan Form Tambah Data
    public function create()
    {
        $kategori = Kategori::all();
        return view('transaksi.create', ['kategori' => $kategori]);
    }

    // Menampilkan Form Edit Data
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $kategori = Kategori::all();
        return view('transaksi.edit', [
            'kategori' => $kategori,
            'transaksi' => $transaksi
        ]);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect('/')->with('success', 'Transaksi berhasil diubah');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect('/')->with('success', 'Transaksi berhasil dihapus');
    }

    // Memproses Data Input (Request & Validation)
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'keterangan' => 'required|min:5|max:100',
            'nominal'    => 'required|numeric|min:1000',
            'kategori_id' => 'required|exists:kategori,id',
            'tanggal'    => 'required|date'
        ]);

        /// 2. Simpan ke Database (Eloquent Mass Assignment)
        // Data $validated sudah sesuai dengan field di database
        Transaksi::create($validated);

        // 3. Response Redirect
        return redirect('/')->with('success', 'Transaksi berhasil disimpan ke database');
    }
}
