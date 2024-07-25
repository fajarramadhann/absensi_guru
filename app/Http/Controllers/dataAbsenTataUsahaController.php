<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\rekapAbsen;
use Illuminate\Http\Request;

class dataAbsenTataUsahaController extends Controller
{
    public function index(Request $request): View
    {
        $filterTanggal = $request->query('tanggal_absen');

        if ($filterTanggal) {
            $dataAbsenTataUsaha = rekapAbsen::with('absenable')
                ->where('absenable_type', 'App\Models\dataTataUsaha')
                ->whereDate('tanggal_absen', $filterTanggal)
                ->latest()
                ->get();
        } else {
            $dataAbsenTataUsaha = rekapAbsen::with('absenable')
                ->where('absenable_type', 'App\Models\dataTataUsaha')
                ->latest()
                ->get();
        }
        return view('dataAbsenTataUsaha', compact('dataAbsenTataUsaha'));
    }


        }