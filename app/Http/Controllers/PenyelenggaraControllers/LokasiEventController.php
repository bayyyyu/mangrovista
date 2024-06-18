<?php

namespace App\Http\Controllers\PenyelenggaraControllers;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiEventController extends Controller
{
    function create(){
        return view('Penyelenggara.Event.lokasi');
    }
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat_lokasi' => 'required|string|max:255',
            'jenis_ekosistem' => 'required|string|max:255',
            'foto_lokasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        $lokasi = new Lokasi;
        $lokasi->nama_lokasi = request('nama_lokasi');
        $lokasi->alamat_lokasi = request('alamat_lokasi');
        $lokasi->jenis_ekosistem = request('jenis_ekosistem');
        $lokasi->lat = request('lat');
        $lokasi->lng = request('lng');
        $lokasi->handleUploadFoto();
        $lokasi->save();

        return redirect('Pengajuan-Event/create')->with('success', 'Lokasi berhasil ditambahkan');
    }
}
