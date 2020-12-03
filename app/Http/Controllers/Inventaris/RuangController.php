<?php

namespace App\Http\Controllers\Inventaris;

use App\Models\Ruang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang = Ruang::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.ruang.index', compact('ruang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('admin.ruang.form-create', [
            'kodeRuang' => rand(1, 9999999999)
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
            'nama_ruang' => ['required', 'string'],
            'kode_ruang' => ['required', 'string', 'max:10'],
            'keterangan' => ['required', 'string']
        ]);

        $ruangan = Ruang::create([
            'nama_ruang' => strtoupper($request->nama_ruang),
            'kode_ruang' => $request->kode_ruang,
            'keterangan' => $request->keterangan
        ]);

        session()->flash('success', 'Data Ruangan berhasil Ditambahkan!');
        return redirect()->route('ruang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang = Ruang::findOrFail($id);
        return view('admin.ruang.show', compact('ruang'));
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
        $ruang = Ruang::findOrFail($id);
        return view('admin.ruang.form-edit', compact('ruang'));
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
            'nama_ruang' => ['required', 'string'],
            'kode_ruang' => ['required', 'string', 'max:10'],
            'keterangan' => ['required', 'string']
        ]);

        $ruangan = Ruang::where('id', $id)->update([
            'nama_ruang' => strtoupper($request->nama_ruang),
            'kode_ruang' => $request->kode_ruang,
            'keterangan' => $request->keterangan
        ]);

        session()->flash('success', 'Data Ruangan berhasil di Edit!');
        return redirect()->route('ruang.index');
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
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();

        session()->flash('success', 'Data Ruangan berhasil di Hapus!');
        return redirect()->route('ruang.index');
    }
}
