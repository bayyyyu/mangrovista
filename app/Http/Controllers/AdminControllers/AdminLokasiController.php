<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLokasiController extends Controller
{
    function index()
    {
        $list_event = Event::all();
        $list_lokasi = Lokasi::with(['events.tanaman_event'])->get();
        $list_lokasi->each(function ($lokasi) {
            $lokasi->total_pohon_ditanam = $lokasi->events->sum(function ($event) {
                return $event->tanaman_event->jumlah_pohon ?? 0;
            });
        });
        return view('Admin.Lokasi.index', compact('list_lokasi', 'list_event'));
    }
    function create()
    {
        return view('Admin.Lokasi.create');
    }
    function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'alamat_lokasi' => 'required|string|max:255',
            'jenis_ekosistem' => 'required|string|max:255',
            'foto_lokasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ], [
            'nama_lokasi.required' => 'Nama Lokasi wajib diisi.',
            'nama_lokasi.string' => 'Nama Lokasi harus berupa teks.',
            'nama_lokasi.max' => 'Nama Lokasi tidak boleh lebih dari 255 karakter.',

            'alamat_lokasi.required' => 'Alamat Lokasi wajib diisi.',
            'alamat_lokasi.string' => 'Alamat Lokasi harus berupa teks.',
            'alamat_lokasi.max' => 'Alamat Lokasi tidak boleh lebih dari 255 karakter.',

            'jenis_ekosistem.required' => 'Jenis Ekosistem wajib diisi.',
            'jenis_ekosistem.string' => 'Jenis Ekosistem harus berupa teks.',
            'jenis_ekosistem.max' => 'Jenis Ekosistem tidak boleh lebih dari 255 karakter.',

            'foto_lokasi.required' => 'Foto Lokasi wajib diunggah.',
            'foto_lokasi.image' => 'Foto Lokasi harus berupa gambar.',
            'foto_lokasi.mimes' => 'Foto Lokasi harus berupa file dengan format jpeg, png, jpg, atau gif.',
            'foto_lokasi.max' => 'Ukuran Foto Lokasi tidak boleh lebih dari 2MB.',

            'lat.required' => 'Latitude wajib diisi.',
            'lat.numeric' => 'Latitude harus berupa angka.',

            'lng.required' => 'Longitude wajib diisi.',
            'lng.numeric' => 'Longitude harus berupa angka.',
        ]);


        $lokasi = new Lokasi;
        $lokasi->nama_lokasi = request('nama_lokasi');
        $lokasi->alamat_lokasi = request('alamat_lokasi');
        $lokasi->jenis_ekosistem = request('jenis_ekosistem');
        $lokasi->lat = request('lat');
        $lokasi->lng = request('lng');
        $lokasi->handleUploadFoto();
        $lokasi->save();

        return redirect('Admin/Lokasi')->with('success', 'Lokasi berhasil ditambahkan');
    }
    function show(Lokasi $lokasi)
    {
        // Hitung total event di lokasi tersebut
        $totalEvent = $lokasi->events()->count();

        // Hitung jumlah pohon yang ditanam di lokasi tersebut
        $totalPohonDitanam = $lokasi->events()
            ->with('tanaman_event')
            ->get()
            ->sum(function ($event) {
                return $event->tanaman_event->jumlah_pohon ?? 0;
            });

        // Hitung jumlah pohon hidup di lokasi tersebut
        $totalPohonHidup = $lokasi->events()
            ->with('monitoring_events')
            ->get()
            ->sum(function ($event) {
                return $event->monitoring_events->sum('pohon_hidup') ?? 0;
            });

        // Hitung panjang isian dari progresbar
        $percentage = $totalPohonDitanam > 0
            ? ($totalPohonHidup / $totalPohonDitanam) * 100
            : 0;


        $data['list_event'] = Event::where('lokasi_id', $lokasi->id)->get();
        $data['lokasi'] = $lokasi;
        $data['totalEvent'] = $totalEvent;
        $data['totalPohonDitanam'] = $totalPohonDitanam;
        $data['totalPohonHidup'] = $totalPohonHidup;

        return view('Admin.Lokasi.show', $data, compact('percentage'));
    }
    function edit($id)
    {
        $lokasi = Lokasi::find($id);
        $data['lokasi'] = $lokasi;
        return view('Admin.Lokasi.edit', $data);
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'jenis_ekosistem' => 'required|string|max:255',
            'alamat_lokasi' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'foto_lokasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional, hanya jika ada perubahan foto
        ]);

        // Temukan lokasi berdasarkan ID
        $lokasi = Lokasi::findOrFail($id);

        // Update data lokasi
        $lokasi->nama_lokasi = $request->input('nama_lokasi');
        $lokasi->jenis_ekosistem = $request->input('jenis_ekosistem');
        $lokasi->alamat_lokasi = $request->input('alamat_lokasi');
        $lokasi->lat = $request->input('lat');
        $lokasi->lng = $request->input('lng');
        if ($request->hasFile('foto_lokasi')) {
            $lokasi->handleUploadFoto();
        }
        // Simpan perubahan
        $lokasi->save();

        // Redirect dengan pesan sukses
        return redirect('Admin/Lokasi')->with('success', 'Data lokasi berhasil diperbarui.');
    }

    function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect('Admin/Lokasi')->with('danger', 'Data Berhasil Dihapus');
    }
}
