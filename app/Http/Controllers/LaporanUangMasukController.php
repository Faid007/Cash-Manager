<?php

namespace App\Http\Controllers;

use App\Models\LaporanUangMasuk;
use Illuminate\Http\Request;

class LaporanUangMasukController extends Controller
{
    public function index()
    {
        $laporanUangMasuk = LaporanUangMasuk::all();

        return view('form.laporan.uang-masuk.index', compact('laporanUangMasuk'));
    }
}
