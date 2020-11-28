<?php

namespace App\Http\Controllers\Peminjaman;

use App\Models\{Inventaris, Ruang, Jenis, Peminjaman, Pegawai};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        // dd(\Auth::user()->level->nama_level);
        if(\Auth::user()->level->nama_level == "Pegawai") {
            $peminjaman = Peminjaman::where(['pegawai_id' => \Auth::user()->pegawai->id])->orderBy('updated_at', 'DESC')->paginate(10);
        } else {
            $peminjaman = Peminjaman::orderBy('updated_at', 'DESC')->paginate(10);
        }
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function createRequestPinjam()
    {
        return view('admin.peminjaman.create-request-pinjam');
    }
    public function storeRequestPinjam(Request $r)
    {
        $r->validate([
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required',
        ]);

        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => $r->tanggal_pinjam,
            'tanggal_kembali' => null,
            'status_peminjaman' => 0,
            'pegawai_id' => auth()->user()->pegawai->id
        ]);

        session()->flash('success', 'Request berhasil Ditambahkan!');
        return redirect()->route('detail.index', $peminjaman->id);
    }
    
}
