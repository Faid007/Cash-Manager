<?php

namespace App\Http\Controllers;

use App\Models\LaporanUangKeluar;
use Illuminate\Http\Request;

class LaporanUangKeluarController extends Controller
{
    public function index()
    {
        $laporanKeluar = LaporanUangKeluar::all();

        return view('form.laporan.uang-keluar.index', compact('laporanKeluar'));
    }
}