<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PenanamanController extends Controller
{
    function index()
    {
        $user = request()->user();
        $data['list_tanaman'] = $user->tanaman;
        return view('Web.Profil.Penanaman.index', $data);
    }
    function create()
    {
        return view('Web.Profil.Penanaman.create'); 
    }
    function store(Request $request)
    {
        if (Auth::check()) {
            Session::flash('lokasi', $request->lokasi);
            Session::flash('umur_tanaman', $request->umur_tanaman);
            Session::flash('lat', $request->lat);
            Session::flash('lng', $request->lng);
            Session::flash('deskripsi', $request->deskripsi);
            Session::flash('sample', $request->sample);
            Session::flash('tanggal_penanaman', $request->tanggal_penanaman);
            Session::flash('jenis_mangrove', $request->jenis_mangrove);
            Session::flash('jenis_tanah', $request->jenis_tanah);
            Session::flash('masa_tumbuh', $request->masa_tumbuh);

            $request->validate([
                'lokasi' => 'required',
                'umur_tanaman' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'deskripsi' => 'required',
                'sample' => 'required',
                'tanggal_penanaman' => 'required',
                'jenis_mangrove' => 'required',
                'jenis_tanah' => 'required',
                'masa_tumbuh' => 'required',
            ], [
                'lokasi.required' => 'Lokasi Wajib Diisi',
                'umur_tanaman.required' => 'Umur Tanaman Saat Ditanam Wajib Diisi',
                'lat.required' => 'latitude Wajib Diisi',
                'lng.required' => 'longitude Wajib Diisi',
                'deskripsi.required' => 'deskripsi Wajib Diisi',
                'sample.required' => 'Sample Penanaman Wajib Diisi',
                'tanggal_penanaman.required' => 'Tanggal Penanaman Wajib Diisi',
                'jenis_mangrove.required' => 'Jenis Mangrove Wajib Diisi',
                'jenis_tanah.required' => 'Jenis Tanah Wajib Diisi',
                'masa_tumbuh.required' => 'Masa Tumbuh Wajib Diisi',

            ]);


            // memeriksa apakah pengguna sudah login
            $tanaman = new Tanaman;
            $tanaman->id = request('id');
            $tanaman->sample = request('sample');
            $tanaman->tanggal_penanaman = request('tanggal_penanaman');
            $tanaman->jenis_mangrove = request('jenis_mangrove');
            $tanaman->jenis_tanah = request('jenis_tanah');
            $tanaman->masa_tumbuh = request('masa_tumbuh');
            $tanaman->lokasi = request('lokasi');
            $tanaman->umur_tanaman = request('umur_tanaman');
            $tanaman->lat = request('lat');
            $tanaman->lng = request('lng');
            $tanaman->deskripsi = request('deskripsi');
            $tanaman->user_id = Auth::user()->id;

            $tanaman->handleUploadFoto();
            $tanaman->save();

            return redirect('Penanaman')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('Auth/Login')->with('error', 'Anda harus login terlebih dahulu');
        }
    }

    function show(Tanaman $tanaman)
    {
        $data['tanaman'] = $tanaman;
        return view('Web.Profil.Penanaman.show', $data);
    }
    
    function edit(Tanaman $tanaman)
    {
        $data['tanaman'] = $tanaman;
        return view('Web.Profil.Penanaman.edit', $data);
    }

    function update(Tanaman $tanaman)
    {
        $tanaman->sample = request('sample');
        $tanaman->tanggal_penanaman = request('tanggal_penanaman');
        $tanaman->jenis_mangrove = request('jenis_mangrove');
        $tanaman->jenis_tanah = request('jenis_tanah');
        $tanaman->masa_tumbuh = request('masa_tumbuh');
        $tanaman->lokasi = request('lokasi');
        $tanaman->umur_tanaman = request('umur_tanaman');
        $tanaman->lat = request('lat');
        $tanaman->lng = request('lng');
        $tanaman->deskripsi = request('deskripsi');
        $tanaman->user_id = Auth::user()->id;

        $tanaman->handleUploadFoto();
        $tanaman->save();

        return redirect('Penanaman')->with('success', 'Data berhasil diubah');
    }

    function destroy(Tanaman $tanaman)
    {
        $tanaman->handleDelete();
        $tanaman->delete();

        return redirect('Penanaman')->with('danger', 'Data Berhasil Dihapus');
    }
}
