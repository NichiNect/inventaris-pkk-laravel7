<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

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
        $petugas = Petugas::paginate(10);
        return view('admin.user-management.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_num', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'level' => ['required'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
