<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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

        $uangMasuk = UangKeluar::findOrFail($id);

        $uangMasuk->update([
            'kategori_id' => $request->kategori,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UangKeluar::where('id', $id)->delete();

        return redirect()->route('keluar.index');
    }
}
