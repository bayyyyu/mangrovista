<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\RoleRequest;
use Illuminate\Http\Request;

class PengajuanPeranController extends Controller
{
    public function index(Request $request)
    {
        $page_baru = $request->query('page_baru', 1);

        // Menampilkan permintaan yang menunggu konfirmasi dalam tab "Menunggu Konfirmasi"
        $list_menunggu_konfirmasi = RoleRequest::where('status_request', 'Menunggu Konfirmasi')->get();

        // Menampilkan permintaan yang sudah diterima dalam tab "Diterima"
        $list_diterima = RoleRequest::where('status_request', 'Diterima')->get();

        // Menampilkan permintaan yang sudah ditolak dalam tab "Ditolak"
        $list_ditolak = RoleRequest::where('status_request', 'Ditolak')->get();

        // Mengembalikan data ke view
        return view('Admin.Pengajuan-Peran.index', compact('page_baru', 'list_menunggu_konfirmasi', 'list_diterima', 'list_ditolak'));
    }
    function show(RoleRequest $role_request)
    {
        $data['role_request'] = $role_request;
        return view('Admin.Pengajuan-Peran.show', $data);
    }
    public function reject(Request $request, RoleRequest $role_request)
    {

        $request->validate([
            'alasan_penolakan' => 'required|string',
        ]);

        $role_request->status_request = 'Ditolak';
        if (request('alasan_penolakan')) $role_request->alasan_penolakan = (request('alasan_penolakan'));
        $role_request->save();

        $user = $role_request->user;

        if ($user) {
            $user->role = 'pengguna';
            $user->save();
        }
        return $this->redirectToPengajuanPeran();
    }
    public function konfirm(RoleRequest $role_request)
    {

        $role_request->status_request = 'Diterima';
        $role_request->save();

        $user = $role_request->user;

        if ($user) {
            $user->role = 'penyelenggara';
            $user->save();
        }

        return $this->redirectToPengajuanPeran();
    }

    protected function redirectToPengajuanPeran()
    {
        return redirect('Admin/Pengajuan-Peran')->with('success', 'Operasi berhasil dilakukan.');
    }
}
