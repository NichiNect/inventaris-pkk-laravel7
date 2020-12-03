<?php

namespace App\Http\Controllers\Inventaris;

use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisController extends Controller
{
    public function messages() {
        return [
            "required" => ":attribute tidak boleh kosong",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max.",
            "same" => ":attribute dan :other harus sama"
        ];
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('admin.jenis.form-create', [
            'kodeJenis' => rand(1, 9999999999)
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
            'nama_jenis' => ['required', 'string'],
            'kode_jenis' => ['required', 'string', 'max:10'],
            'keterangan' => ['required', 'string']
        ]);

        $jenis = Jenis::create([
            'nama_jenis' => $request->nama_jenis,
            'kode_jenis' => $request->kode_jenis,
            'keterangan' => $request->keterangan
        ]);

        session()->flash('success', 'Data Jenis Inventaris berhasil Ditambahkan!');
        return redirect()->route('jenis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.show', compact('jenis'));
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
        $jenis = Jenis::findOrFail($id);
        return view('admin.jenis.form-edit', compact('jenis'));
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
            'nama_jenis' => ['required', 'string'],
            'kode_jenis' => ['required', 'string', 'max:10'],
            'keterangan' => ['required', 'string']
        ]);

        $jenis = Jenis::where('id', $id)->update([
            'nama_jenis' => $request->nama_jenis,
            'keterangan' => $request->keterangan,
        ]);

        session()->flash('success', 'Data Jenis Inventaris berhasil di Edit!');
        return redirect()->route('jenis.index');
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
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        session()->flash('success', 'Data Jenis Inventaris berhasil di Hapus!');
        return redirect()->route('jenis.index');
    }
}
