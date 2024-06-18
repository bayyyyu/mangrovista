<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tanaman;
use App\Models\Event;

class ProfilController extends Controller
{
    function index()
    {
        $user = request()->user();
        $totalPengajuanEvent = Event::where('user_id', $user->id)->count();

        $list_event = Event::where('user_id', $user->id)->withCount('peserta')->paginate(3);
        $data = [
            'list_role_request' => $user->role_request,
            'list_tanaman' => Tanaman::all(),
            'list_event' => $list_event,
            'user' => Auth::user(),
            'total_pengajuan_event' => $totalPengajuanEvent,
        ];
        return view('Web.Profil.index', $data);
    
    }
    function updatePengaturanAkun(User $user)
    {
        if (request('nama_lengkap')) $user->nama_lengkap = (request('nama_lengkap'));
        if (request('username')) $user->username = (request('username'));
        if (request('email')) $user->email = (request('email'));
        if (request('role')) $user->role = (request('role'));
        if (request('password')) $user->password = (request('password'));
        if (request('no_telpon')) $user->no_telpon = (request('no_telpon'));
        if (request('foto_profil')) $user->handleUploadFoto();
        $user->save();
        return redirect('Profil')->with('success', 'Data Berhasil Diedit');
    }
}
