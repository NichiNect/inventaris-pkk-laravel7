<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
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
        $pegawai = Pegawai::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.user-management.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        return view('admin.user-management.pegawai.form-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'nip' => ['required'],
            'alamat' => ['required'],
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
            $pegawai = Pegawai::create([
                'user_id' => $user->id,
                'nama_pegawai' => $user->name,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
            ]);
        }

        session()->flash('success', 'Data berhasil Ditambahkan!');
        return redirect()->route('pegawai.show', $pegawai->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.user-management.pegawai.detail', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.user-management.pegawai.form-edit', compact('pegawai'));
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
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'nip' => ['required'],
            'alamat' => ['required'],
            'level' => ['required'],
            'password' => ['required', 'string', 'min:5'],
        ]);

        $pegawaiLama = Pegawai::findOrFail($id);

        $user = \App\User::where('id', $pegawaiLama->user_id)->update([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        if($request->nama!=$pegawaiLama->nama_pegawai || $request->nip!=$pegawaiLama->nip || $request->alamat!=$pegawaiLama->alamat) {
            $pegawai = Pegawai::where('id', $id)->update([
                'nama_pegawai' => $request->nama,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
            ]);
        }
        $pegawai = Pegawai::findOrFail($id);

        session()->flash('success', 'Data berhasil di Edit!');
        return redirect()->route('pegawai.show', $pegawai->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->user()->can('isPegawai')) {
            abort('403', 'Akun Anda tidak memiliki Akses');
        }
        $pegawai = Pegawai::findOrFail($id);

        if($pegawai) {
            $user = \App\User::where('id', $pegawai->user_id)->delete();
            $pegawai->delete();
        }

        session()->flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('pegawai.index');
    }
}
