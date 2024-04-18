<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function Auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' =>"Akun belum ada !"
        ]);

        $user = $request->only('email','password');
        if(Auth::attempt($user)){
            return redirect()->route('dashboard.view');
        }else{
            return redirect()->back()->with('error','Periksa Email dan Password');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


    public function inputRegister(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'nama_toko' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'nama_toko' => $request->nama_toko,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role' => 'admin',
        ]);
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }
}
