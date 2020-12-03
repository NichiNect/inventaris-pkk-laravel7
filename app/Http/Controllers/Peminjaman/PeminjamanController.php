<?php

namespace App\Http\Controllers\Peminjaman;

use App\Models\{Inventaris, Ruang, Jenis, Peminjaman, Pegawai, DetailPinjam};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    /**
     * Method menampilkan index peminjaman
     * @return view
     */
    public function index()
    {
        if(\Auth::user()->level->nama_level == "Pegawai") {
            $peminjaman = Peminjaman::where(['pegawai_id' => \Auth::user()->pegawai->id, 'status_peminjaman' => 0])->orderBy('updated_at', 'DESC')->paginate(10);
        } else {
            $peminjaman = Peminjaman::where(['status_peminjaman' => 0])->orderBy('updated_at', 'DESC')->paginate(10);
        }
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Method menampilkan index acc peminjaman
     */
    public function accIndex()
    {
        if(\Auth::user()->level->nama_level == "Pegawai") {
            $peminjaman = Peminjaman::where(['pegawai_id' => \Auth::user()->pegawai->id, 'status_peminjaman' => 1])->orderBy('updated_at', 'DESC')->paginate(10);
        } else {
            $peminjaman = Peminjaman::where(['status_peminjaman' => 1])->orderBy('updated_at', 'DESC')->paginate(10);
        }
        return view('admin.peminjaman.index-acc-pinjam', compact('peminjaman'));
    }

    /**
     * Method request kembali
     */
    public function reqKembaliIndex()
    {
        if(\Auth::user()->level->nama_level == "Pegawai") {
            $peminjaman = Peminjaman::where(['pegawai_id' => \Auth::user()->pegawai->id, 'status_peminjaman' => 2])->orderBy('updated_at', 'DESC')->paginate(10);
        } else {
            $peminjaman = Peminjaman::where(['status_peminjaman' => 2])->orderBy('updated_at', 'DESC')->paginate(10);
        }
        return view('admin.peminjaman.index-req-kembali', compact('peminjaman'));
    }

    /**
     * Method menampilkan halaman History index
     * @return view
     */
    public function historyIndex()
    {
        if(\Auth::user()->level->nama_level == "Pegawai") {
            $peminjaman = Peminjaman::where(['pegawai_id' => \Auth::user()->pegawai->id, 'status_peminjaman' => 3])->orderBy('updated_at', 'DESC')->paginate(10);
        } else {
            $peminjaman = Peminjaman::where(['status_peminjaman' => 3])->orderBy('updated_at', 'DESC')->paginate(10);
        }
        return view('admin.peminjaman.index-history', compact('peminjaman'));
    }
    /**
     * Method untuk menampilkan detail dari history peminjaman (show)
     * @param Request $id
     * @return view
     */
    public function historyShow($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $detailPinjam = DetailPinjam::where(["peminjaman_id" => $peminjaman->id])->get();
        
        return view('admin.peminjaman.show-history', [
            'peminjaman' => $peminjaman,
            'detailPinjam' => $detailPinjam
        ]);
    }

    /**
     * Method untuk menampilkan form pembuatan request pinjam
     * @return view
     */
    public function createRequestPinjam()
    {
        return view('admin.peminjaman.create-request-pinjam');
    }
    /**
     * Method untuk store request pinjam, menambahkan data di tabel `peminjaman`
     * @param Request $r
     * @return view
     */
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

    /**
     * Method delete untuk menghapus detail pinjam yang berkaitan dengan data peminjaman
     * @param Request $id
     * @return view
     */
    public function deleteRequestPinjam($id)
    {
        $peminjaman = Peminjaman::findOrfail($id);

        $detailPinjam = DetailPinjam::where(['peminjaman_id' => $id])->get();
        foreach($detailPinjam as $d) {
            $d->delete();
        }

        $peminjaman->delete();

        session()->flash('success', 'Request berhasil Dihapus!');
        return redirect()->back();
    }

    /**
     * Method patch untuk acc request peminjaman
     * @param Request $id
     * @return view->back
     */
    public function accRequestPinjam($id)
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $peminjaman = Peminjaman::findOrFail($id);
        
        foreach($peminjaman->detail_pinjam as $p) {
            if($p->inventaris->jumlah >= $p->jumlah) {
                // update jumlah barang
                $inventaris = Inventaris::findOrFail($p->inventaris_id);
                $invUpdate = Inventaris::where(['id' => $p->inventaris_id])
                ->update([
                    'jumlah' => $inventaris->jumlah - $p->jumlah,
                ]);
                // update status
                $peminjaman = Peminjaman::where(['id' => $id])
                ->update([
                    'status_peminjaman' => 1,
                ]);

            } else if($p->inventaris->jumlah <= $p->jumlah) { //jika jumlah di gudang kurang dari yang dipinjam
                return abort(403, "Terjadi Kesalahan Pada Detail Peminjaman");
            }
        }

        session()->flash('success', "Permintaan telah di ACC!");
        return redirect()->back();
    }

    /**
     * Method untuk mengajukan request pinjam
     * @param Request $id
     * @return view->back
     */
    public function requestKembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status_peminjaman' => 2
        ]);

        session()->flash('success', "Request pengembalian telah dikirim!");
        return redirect()->back();
    }
    /**
     * Method untuk membatalkan request pinjam
     * @param Request $id
     * @return view->back
     */
    public function cancelRequestKembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status_peminjaman' => 1
        ]);

        session()->flash('success', "Request kembali telah berhasil dibatalkan!");
        return redirect()->back();
    }
    /**
     * Method untuk acc request kembali
     * @param Request $id
     */
    public function accRequestKembali($id)
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $peminjaman = Peminjaman::findOrFail($id);
        
        foreach($peminjaman->detail_pinjam as $p) {
            // update jumlah
            $inventaris = Inventaris::findOrFail($p->inventaris_id);
            $invUpdate = Inventaris::where(['id' => $p->inventaris_id])
            ->update([
                'jumlah' => $inventaris->jumlah + $p->jumlah,
            ]);
            // update status
            $peminjaman->update([
                'status_peminjaman' => 3,
                'tanggal_kembali' => date('Y-m-d',time())
            ]);
        }

        session()->flash('success', "Permintaan telah di ACC!");
        return redirect()->back();
    }

}
