<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Golongan;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function index()
    {

        $totalGolongan = Golongan::count();
        $totalPegawai = Pegawai::count();
        return view('dashboard.index', [
            "tittle" => "Dashboard",
            "active" => "dashboard",
            "totalGolongan" => $totalGolongan,
            "totalPegawai" => $totalPegawai
        ]);
    }
}
