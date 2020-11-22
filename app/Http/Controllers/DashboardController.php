<?php

namespace App\Http\Controllers;

use App\Models\{Pegawai, Petugas, Inventaris, Ruang};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::count();
        $petugas = Petugas::count();
        $inventaris = Inventaris::count();
        $ruang = Ruang::count();

        return view('admin.dashboard', [
            'pegawai' => $pegawai,
            'petugas' => $petugas,
            'inventaris' => $inventaris,
            'ruang' => $ruang
        ]);
    }
}
