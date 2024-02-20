<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\LaporanUangKeluar;
use App\Models\UangKeluar;
use Illuminate\Http\Request;

class UangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uangKeluars = UangKeluar::with('kategori')->get();

        return view('form.uang-keluar.index', compact('uangKeluars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = array(
            'kategoris' => Kategori::all()
        );

        return view('form.uang-keluar.add', $data);
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

        UangKeluar::create([
            'kategori_id' => $request->kategori,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        $bulan = date('Y-m', strtotime($request->tanggal));

        $laporan = LaporanUangKeluar::where('bulan', $bulan)->first();

        if ($laporan) {
            $laporan->total_nominal += $request->nominal;
            $laporan->save();
        } else {
            LaporanUangKeluar::create([
                'bulan' => $bulan,
                'total_nominal' => $request->nominal,
            ]);
        }

        return redirect()->route('keluar.index');
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
            'uangKeluar' => UangKeluar::findOrFail($id),
            'kategoris' => Kategori::all()
        );

        return view('form.uang-keluar.edit', $data);
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

        $uangKeluar = UangKeluar::findOrFail($id);

        $oldDate = $uangKeluar->tanggal;
        $oldNominal = $uangKeluar->nominal;

        $uangKeluar->update([
            'kategori_id' => $request->kategori,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        $oldMonth = date('Y-m', strtotime($oldDate));
        $newMonth = date('Y-m', strtotime($request->tanggal));

        if ($oldMonth !== $newMonth) {
            $oldLaporan = LaporanUangKeluar::where('bulan', $oldMonth)->first();
            $oldLaporan->total_nominal -= $oldNominal;
            $oldLaporan->save();

            $newLaporan = LaporanUangKeluar::where('bulan', $newMonth)->first();

            if ($newLaporan) {
                $newLaporan->total_nominal += $request->nominal;
                $newLaporan->save();
            } else {
                LaporanUangKeluar::create([
                    'bulan' => $newMonth,
                    'total_nominal' => $request->nominal,
                ]);
            }
        } else {
            $laporan = LaporanUangKeluar::where('bulan', $newMonth)->first();
            $laporan->total_nominal += ($request->nominal - $oldNominal);
            $laporan->save();
        }


        return redirect()->route('keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $uangKeluar = UangKeluar::findOrFail($id);

        $tanggal = $uangKeluar->tanggal;
        $nominal = $uangKeluar->nominal;

        $uangKeluar->delete();

        $bulan = date('Y-m', strtotime($tanggal));

        $laporan = LaporanUangKeluar::where('bulan', $bulan)->first();
        $laporan->total_nominal -= $nominal;
        $laporan->save();

        return redirect()->route('keluar.index');
    }
}