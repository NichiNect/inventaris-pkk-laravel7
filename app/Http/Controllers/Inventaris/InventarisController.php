<?php

namespace App\Http\Controllers\Inventaris;

use App\Models\{Inventaris, Jenis, Ruang};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::paginate(20);
        return view('admin.inventaris.index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $jenis = Jenis::get();
        $ruang = Ruang::get();
        return view('admin.inventaris.form-create', [
            'jenis' => $jenis,
            'ruang' => $ruang
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $request->validate([
            'nama_barang' => ['required'],
            'kondisi' => ['required'],
            'keterangan' => ['required'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'ruang' => ['required'],
            'jenis' => ['required'],
            'petugas' => ['required'],
        ]);
        $jenis = Jenis::findOrFail($request->jenis);
        $ruang = Ruang::findOrFail($request->ruang);
        
        $kodeInventaris = date('d',strtotime(now())).date('m',strtotime(now())).date('Y',strtotime(now())).'-J'.$jenis->kode_jenis.'-R'.$ruang->kode_ruang.'-P'.auth()->user()->id.'-'.random_int(0,100);
        
        $inventaris = Inventaris::create([
            'nama' => $request->nama_barang,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            // 'tanggal_register' => now(),
            'kode_inventaris' => $kodeInventaris,
            'ruang_id' => $request->ruang,
            'jenis_id' => $request->jenis,
            'petugas_id' => auth()->user()->id,
        ]);

        session()->flash('success', 'Data Barang Inventaris berhasil Ditambahkan!');
        return redirect()->route('invent.show', $inventaris->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('admin.inventaris.detail', compact('inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('isAdmin');
        $inventaris = Inventaris::findOrFail($id);
        $jenis = Jenis::get();
        $ruang = Ruang::get();

        return view('admin.inventaris.form-edit', [
            'inventaris' => $inventaris,
            'jenis' => $jenis,
            'ruang' => $ruang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('isAdmin');
        $request->validate([
            'nama_barang' => ['required'],
            'kondisi' => ['required'],
            'keterangan' => ['required'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'ruang' => ['required'],
            'jenis' => ['required'],
            'petugas' => ['required'],
        ]);

        $inventaris = Inventaris::where('id', $id)->update([
            'nama' => $request->nama_barang,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            // 'tanggal_register' => now(),
            // 'kode_inventaris' => $kodeInventaris,
            'ruang_id' => $request->ruang,
            'jenis_id' => $request->jenis,
            'petugas_id' => auth()->user()->id,
        ]);
        
        $inventaris = Inventaris::findOrFail($id);
            
        session()->flash('success', 'Data Barang Inventaris berhasil di Edit!');
        return redirect()->route('invent.show', $inventaris->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        session()->flash('success', 'Data Barang Inventaris berhasil di Hapus!');
        return redirect()->route('invent.index');
    }
}
