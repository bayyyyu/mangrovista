<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('Auth/Login');
    }
    function loginProcess(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

         // Periksa apakah email terdaftar
        $rememberMe = $request->has('remember_token');
        Session::flash('email', $request->email);

        // Periksa apakah email terdaftar
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('danger', 'Login gagal, Email tidak terdaftar');
        }

         // autentikasi pengguna dengan kredensial (email dan password)
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')], $rememberMe)) {
            $user = Auth::user();
            if ($user->role == 'admin') return redirect('Admin/Dashboard')->with('success', 'Login Berhasil');
            if ($user->role == 'pengguna') return redirect('Home')->with('success', 'Login Berhasil');
            if ($user->role == 'penyelenggara') return redirect('Home')->with('success', 'Login Berhasil');
        } else {
            return back()->with('success', 'Login Gagal, Silahlan cek email dan password anda');
        }
    }

    function logout()
    {

        Auth::logout();

        return redirect('Home');
    }

    function forgotPassword()
    {
        return view('Auth/Login');
    }

    function register()
    {
        return view('Auth/Register  ');
    }

    function createAcount(Request $request)
    {
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);

        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
        ], [
            'nama_lengkap.required' => 'Nama Wajib Diisi',
            'username.required' => 'Username Wajib Diisi',
            'username.unique' => 'Username Sudah Digunakan',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Masukkan Email Yang Valid',
            'email.unique' => 'Email Sudah Pernah Digunakan',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Minimum Password 6 Karakter',
        ]);



        $role = 'pengguna';

        $data = [
            'role' => $role,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        if (Auth::attempt(['nama_lengkap' => request('nama_lengkap'), 'username' => request('username'), 'email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user->role == 'admin') return redirect('Admin/Dashboard')->with('success', 'Login Berhasil');
            if ($user->role == 'pengguna') return redirect('Home')->with('success', 'Berhasil Mendaftar');
            // return redirect('Admin/Dashboard')->with('success','Register Berhasil');
        } else {
            return back()->withErrors('danger', 'Silahlan cek lagi! data yang dimasukan tidak valid');
        }
    }
}
