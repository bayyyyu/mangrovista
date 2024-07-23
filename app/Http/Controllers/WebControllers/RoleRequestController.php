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
        // Validasi input dengan pesan error khusus
        $request->validate([
            'alamat' => 'required|string',
            'pengalaman' => 'required|string',
            'alasan' => 'required|string',
            'rencana_acara' => 'required|string',
        ], [
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'pengalaman.required' => 'Pengalaman wajib diisi.',
            'pengalaman.string' => 'Pengalaman harus berupa teks.',
            'alasan.required' => 'Alasan wajib diisi.',
            'alasan.string' => 'Alasan harus berupa teks.',
            'rencana_acara.required' => 'Rencana acara wajib diisi.',
            'rencana_acara.string' => 'Rencana acara harus berupa teks.',
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
    public function update(Request $request, RoleRequest $role_request)
    {
        // Validasi input dengan pesan error khusus
        $request->validate([
            'alamat' => 'required|string',
            'pengalaman' => 'required|string',
            'alasan' => 'required|string',
            'rencana_acara' => 'required|string',
        ], [
            'alamat.required' => 'Alamat harus diisi.',
            'pengalaman.required' => 'Pengalaman harus diisi.',
            'alasan.required' => 'Alasan harus diisi.',
            'rencana_acara.required' => 'Rencana acara harus diisi.',
        ]);

        // Update data role_request jika valid
        if ($request->has('alamat')) $role_request->alamat = $request->input('alamat');
        if ($request->has('pengalaman')) $role_request->pengalaman = $request->input('pengalaman');
        if ($request->has('alasan')) $role_request->alasan = $request->input('alasan');
        if ($request->has('rencana_acara')) $role_request->rencana_acara = $request->input('rencana_acara');

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
