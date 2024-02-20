<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\LaporanUangMasuk;
use App\Models\UangMasuk;
use Illuminate\Http\Request;

class UangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uangMasuks = UangMasuk::with('kategori')->get();

        return view('form.uang-masuk.index', compact('uangMasuks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'kategoris' => Kategori::all()
        );

        return view('form.uang-masuk.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required'
        ]);

        UangMasuk::create([
            'kategori_id' => $request->kategori,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        // Ambil bulan dari tanggal yang disimpan
        $bulan = date('Y-m', strtotime($request->tanggal));

        // Cek apakah sudah ada laporan untuk bulan tersebut
        $laporan = LaporanUangMasuk::where('bulan', $bulan)->first();

        if ($laporan) {
            // Jika laporan sudah ada, tambahkan nominal baru ke total_nominal
            $laporan->total_nominal += $request->nominal;
            $laporan->save();
        } else {
            // Jika belum ada laporan untuk bulan tersebut, buat laporan baru
            LaporanUangMasuk::create([
                'bulan' => $bulan,
                'total_nominal' => $request->nominal,
            ]);
        }

        return redirect()->route('masuk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = array(
            'uangMasuk' => UangMasuk::findOrFail($id),
            'kategoris' => Kategori::all()
        );

        return view('form.uang-masuk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required'
        ]);

        $uangMasuk = UangMasuk::findOrFail($id);

        // Simpan data lama untuk mendapatkan bulan sebelum diupdate
        $oldDate = $uangMasuk->tanggal;
        $oldNominal = $uangMasuk->nominal;

        $uangMasuk->update([
            'kategori_id' => $request->kategori,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        // Ambil bulan dari tanggal sebelum diupdate
        $oldMonth = date('Y-m', strtotime($oldDate));
        // Ambil bulan dari tanggal setelah diupdate
        $newMonth = date('Y-m', strtotime($request->tanggal));

        // Jika bulan berubah, update laporan uang masuk
        if ($oldMonth !== $newMonth) {
            // Kurangi total nominal laporan lama
            $oldLaporan = LaporanUangMasuk::where('bulan', $oldMonth)->first();
            $oldLaporan->total_nominal -= $oldNominal;
            $oldLaporan->save();

            // Cek apakah sudah ada laporan untuk bulan baru
            $newLaporan = LaporanUangMasuk::where('bulan', $newMonth)->first();

            if ($newLaporan) {
                // Jika laporan sudah ada, tambahkan nominal baru ke total_nominal
                $newLaporan->total_nominal += $request->nominal;
                $newLaporan->save();
            } else {
                // Jika belum ada laporan untuk bulan baru, buat laporan baru
                LaporanUangMasuk::create([
                    'bulan' => $newMonth,
                    'total_nominal' => $request->nominal,
                ]);
            }
        } else {
            // Jika bulan tidak berubah, update total nominal laporan yang sesuai
            $laporan = LaporanUangMasuk::where('bulan', $newMonth)->first();
            $laporan->total_nominal += ($request->nominal - $oldNominal);
            $laporan->save();
        }

        return redirect()->route('masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UangMasuk::where('id', $id)->delete();

        return redirect()->route('masuk.index');
    }
}
