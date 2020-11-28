<?php

namespace App\Http\Controllers\Peminjaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Inventaris, Ruang, Jenis, Peminjaman, Pegawai, DetailPinjam};

class DetailPinjamController extends Controller
{
    public function detailIndex($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $detailPinjam = DetailPinjam::where(["peminjaman_id" => $peminjaman->id])->get();
        
        return view('admin.peminjaman.index-detail', [
            'peminjaman' => $peminjaman,
            'detailPinjam' => $detailPinjam
        ]);
    }
    
    public function detailCreate($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $ruang = Ruang::get();
        $jenis = Jenis::get();
        $inventaris = Inventaris::get();
        
        return view('admin.peminjaman.create-detail', [
            'peminjaman' => $peminjaman,
            'ruang' => $ruang,
            'jenis' => $jenis,
            'inventaris' => $inventaris,
        ]);
    }

    public function storeRequestDetail(Request $r)
    {
        $r->validate([
            'nama_peminjam' => ['required'],
            'ruang' => ['required', 'numeric'],
            'jenis' => ['required', 'numeric'],
            'nama_inventaris' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric']
        ]);

        // $inventaris = Inventaris::where([
        //         "ruang_id" => $r->ruang,
        //         "jenis_id" => $r->jenis,
        //         "id" => $r->nama_inventaris
        //     ])->get();

        $inventaris = Inventaris::findOrFail($r->nama_inventaris);
        
        if($inventaris) { 
           if($inventaris->jumlah >= $r->jumlah) { //jumlah barang kurang dari request
                $detailPinjam = DetailPinjam::create([
                    'jumlah' => $r->jumlah,
                    'peminjaman_id' => $r->peminjaman_id,
                    'inventaris_id' => $r->nama_inventaris,
                ]);
           } else {
               session()->flash('error', "Jumlah barang tidak cukup!");
               return redirect()->back();
            }
        } else {
            abort(404);
        }
        
        session()->flash('success', "Detail peminjaman berhasil Ditambahkan!");
        return redirect()->route('detail.index', $detailPinjam->peminjaman_id);
    }
    
    public function deleteRequestDetail($id)
    {
        $detailPinjam = DetailPinjam::findOrFail($id);
        $detailPinjam->delete();

        session()->flash('success', "Detail peminjaman berhasil Dihapus!");
        return redirect()->back();
    }
}
