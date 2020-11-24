<?php

namespace App\Http\Controllers\Peminjaman;

use App\Models\{Inventaris, Ruang, Jenis};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('admin.peminjaman.index');
    }

    public function createRequestPinjam()
    {
        $inventaris = Inventaris::limit(20)->get();
        $ruang = Ruang::get();
        $jenis = Jenis::get();
        return view('admin.peminjaman.form-pinjam', [
            'inventaris' => $inventaris,
            'ruang' => $ruang,
            'jenis' => $jenis,
        ]);
    }

    
}
