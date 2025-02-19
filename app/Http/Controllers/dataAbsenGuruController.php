<?php

namespace App\Http\Controllers;

use App\Models\rekapAbsen;
use Illuminate\Http\Request;

class dataAbsenGuruController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal_absen');

        if ($tanggal) {
            $dataAbsenGuru = rekapAbsen::with('absenable')
                ->where('absenable_type', 'App\Models\dataGuru')
                ->whereDate('tanggal_absen', $tanggal)
                ->latest()
                ->get();
        } else {
            $dataAbsenGuru = rekapAbsen::with('absenable')
                ->where('absenable_type', 'App\Models\dataGuru')
                ->latest()
                ->get();
        }
        return view('dataAbsenGuru', compact('dataAbsenGuru'));
    }
}
