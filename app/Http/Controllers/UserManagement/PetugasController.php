<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetugasController extends Controller
{
    protected $messages = [
        "required" => ":attribute tidak boleh kosong",
        "numeric" => ":attribute hanya boleh berisi angka",
        "min" => ":attribute tidak boleh kurang dari :min.",
        "max" => ":attribute tidak boleh lebih dari :max.",
        "same" => ":attribute dan :other harus sama"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $petugas = Petugas::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.user-management.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        return view('admin.user-management.petugas.form-create');
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
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'level' => ['required'],
            'password' => ['required', 'string', 'min:5', 'same:confirm_password'],
        ]);

        $user = \App\User::create([
            'level_id' => $request->level,
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if($user) {
            $petugas = Petugas::create([
                'user_id' => $user->id,
                'nama_petugas' => $user->name
            ]);
        }

        session()->flash('success', 'Data berhasil Ditambahkan!');
        return redirect()->route('petugas.show', $petugas->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.user-management.petugas.detail', compact('petugas'));
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
        $petugas = Petugas::findOrFail($id);
        return view('admin.user-management.petugas.form-edit', compact('petugas'));
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
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'level' => ['required'],
            'password' => ['required', 'string', 'min:5'],
        ]);

        $petugasLama = Petugas::findOrFail($id);

        $user = \App\User::where('id', $petugasLama->user_id)->update([
            'level_id' => $request->level,
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        if($request->nama != $petugasLama->nama_petugas) {
            $petugas = Petugas::where('id', $id)->update([
                'nama_petugas' => $request->nama
            ]);
        }
        $petugas = Petugas::findOrFail($id);

        session()->flash('success', 'Data berhasil di Edit!');
        return redirect()->route('petugas.show', $petugas->id);
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
        $petugas = Petugas::findOrFail($id);

        if($petugas) {
            $user = \App\User::where('id', $petugas->user_id)->delete();
            $petugas->delete();
        }

        session()->flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('petugas.index');
    }
}
