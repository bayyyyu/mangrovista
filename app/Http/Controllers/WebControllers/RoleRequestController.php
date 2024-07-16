<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\RoleRequest;
use App\Models\User;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class RoleRequestController extends Controller
{
    function create()
    {
        return view('web.Ambil-Peran.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'pengalaman' => 'required|string',
            'alasan' => 'required|string',
            'rencana_acara' => 'required|string',
        ]);

        $user = auth()->user();

        $roleRequest = new RoleRequest();

        $roleRequest->id_user = $user->id;
        $roleRequest->alamat = $request->input('alamat');
        $roleRequest->pengalaman = $request->input('pengalaman');
        $roleRequest->alasan = $request->input('alasan');
        $roleRequest->rencana_acara = $request->input('rencana_acara');
        $roleRequest->request_role = 'penyelenggara'; 
        $roleRequest->status_request = 'Menunggu Konfirmasi';
        $roleRequest->jumlah_edit = '0';


        $roleRequest->save();

        // $this->sendNotificationToAdmin($roleRequest);

        return redirect('Profil')->with('success', 'Permintaan peran berhasil dikirim.');
    }

    // private function sendNotificationToAdmin(RoleRequest $roleRequest)
    // {
    //         $notifikasi = new Notifikasi();
    //         $notifikasi->user_id = $roleRequest->id_user;
    //         $notifikasi->judul = 'Pengajuan peran baru';
    //         $notifikasi->isi = 'Dari ' . $roleRequest->nama_lengkap;
    //         $notifikasi->save();
    // }

    function edit(RoleRequest $role_request)
    {
        $data['role_request'] = $role_request;
        return view('web.Ambil-Peran.edit', $data);
    }
    public function update( RoleRequest $role_request)
    {
        if (request('nama_lengkap')) $role_request->nama_lengkap = (request('nama_lengkap'));
        if (request('email')) $role_request->email = (request('email'));
        if (request('no_telpon')) $role_request->no_telpon = (request('no_telpon'));
        if (request('alamat')) $role_request->alamat = (request('alamat'));
        if (request('pengalaman')) $role_request->pengalaman = (request('pengalaman'));
        if (request('alasan')) $role_request->alasan = (request('alasan'));
        if (request('rencana_acara')) $role_request->rencana_acara = (request('rencana_acara'));
       
        $role_request->jumlah_edit += 1;
        $role_request->save();

        return redirect('Profil')->with('success', 'Data berhasil diedit.');
    }
    // public function reject(Request $request, RoleRequest $role_request)
    // {
        
    //     $request->validate([
    //         'rejection_reason' => 'required|string',
    //     ]);

    //     $role_request->status_request = 'Ditolak';
    //     $role_request->alasan_penolakan = $request->input('rejection_reason');
    //     $role_request->save();

    //     return redirect('Pengajuan-Peran')->with('success', 'Status pengajuan ditolak.');
    // }
}
