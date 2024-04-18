<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $petugasx = User::all();
        return view('content.pegawai.petugas', compact('petugasx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $request->validate([
            'nama'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=> 'required',
        ]);
        User::create([
            'nama' => $request->nama,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('/petugas');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return view('content.pegawai.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function viewEdit($id){
        $petugas = User::where('id', $id)->first();
        return view('content.pegawai.edit', compact('petugas'));
    }


    public function edit(Request $request, $id)
    {
        //
        $request->validate([
            'nama'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=> 'required',
        ]);

        User::where('id', $id)->update([
            'nama'=> $request->nama,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> $request->role,
        ]);
        return redirect('/petugas');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect('petugas');
    }
}
