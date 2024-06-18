<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        $data['list_user'] = User::all();
        return view('Admin.User.index', $data);
    }
    function create()
    {
        return view('Admin.User.create');
    }
    function store()
    {
        $role = 'pengguna';
        

        $user = new User();
        $user->nama_lengkap = request('nama_lengkap');
        $user->username = request('username');
        $user->email = request('email');
        $user->role = $role;
        $user->password = bcrypt(request('password'));
        $user->save();

        $user->handleUploadFoto();
        return redirect('Admin/User')->with('success', 'Data Berhasil Ditambahkan');
    }
    function show(User $user)
    {
        $data['user'] = $user;
        return view('Admin.User.show', $data);
    }
    function edit(User $user)
    {
        $data['user'] = $user;
        return view('Admin.User.edit', $data);
    }
    function update(User $user)
    {
        $user->nama_lengkap = request('nama_lengkap');
        $user->username = request('username');
        $user->email = request('email');
        $user->role = request('role');
        if (request('password')) $user->password = (request('password'));
        if (request('foto_profil')) $user->handleUploadFoto();
        $user->save();
        return redirect('Admin/User')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(User $user)
    {
        // $user->handleDelete();
        $user->delete();

        return redirect('Admin/User')->with('danger', 'Data Berhasil Dihapus');
    }
}
