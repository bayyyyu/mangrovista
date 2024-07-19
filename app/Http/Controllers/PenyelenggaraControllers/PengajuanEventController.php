<?php

namespace App\Http\Controllers\PenyelenggaraControllers;

use App\Http\Controllers\Controller;
use App\Models\DataTambahanEvent;
use App\Models\Event;
use App\Models\Lokasi;
use App\Models\Tanaman;
use App\Models\TanamanEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PengajuanEventController extends Controller
{
    function index(Request $request)
    {
        $data['list_event'] = Event::all();
        $data['jumlah_penanaman'] = [];
        $data['jumlah_pohon_hidup'] = [];

        foreach ($data['list_event'] as $event) {
            // Menghitung jumlah penanaman dengan event_id yang sama
            $jumlahPenanaman = DB::table('tanaman')->where('event_id', $event->id)->count();
            $data['jumlah_penanaman'][$event->id] = $jumlahPenanaman;

            // Menghitung jumlah status_penanaman "hidup" dengan event_id yang sama
            $jumlah_pohon_hidup = Tanaman::where('event_id', $event->id)
                ->where('status_penanaman', 'hidup')
                ->count();
            $data['jumlah_pohon_hidup'][$event->id] = $jumlah_pohon_hidup;
        }

        $page_telah_selesai = $request->query('page_telah_selesai', 1);
        $list_event_telah_selesai = Event::where('tanggal_event', '<', now())->get();

        $page_belum_selesai = $request->query('page_belum_selesai', 1);
        $list_event_belum_selesai = Event::where('tanggal_event', '>', now())->get();

        $page_berlangsung = $request->query('page_berlangsung', 1);
        $list_event_berlangsung = Event::where('tanggal_event', '<=', now())
            ->where('tanggal_selesai', '>=', now())
            ->get();

        return view('Admin.Event.index', compact('list_event_telah_selesai', 'list_event_belum_selesai', 'list_event_berlangsung', 'page_telah_selesai', 'page_belum_selesai', 'page_berlangsung'), $data);
    }
    function create()
    {
        $data['list_lokasi'] = Lokasi::all();
        return view('Penyelenggara.Event.create', $data);
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $event = new Event;
        $event->user_id = $user->id;
        $event->nama_event = $request->input('nama_event');
        $event->tanggal_event = $request->input('tanggal_event');
        $event->tanggal_selesai = $request->input('tanggal_selesai');
        $event->deskripsi = $request->input('deskripsi');
        $event->jam = $request->input('jam');
        $event->target_peserta = $request->input('target_peserta');
        $event->batas_pendaftaran = $request->input('batas_pendaftaran');
        $event->lat = $request->input('lat');
        $event->lng = $request->input('lng');
        $event->lokasi_id = $request->input('lokasi_id');

        $event->handleUploadFoto();
        $event->save();

        // Simpan data tanaman terkait event
        $tanamanEvent = new TanamanEvent;
        $tanamanEvent->event_id = $event->id;
        $tanamanEvent->jenis_pohon = $request->input('jenis_pohon');
        $tanamanEvent->umur_bibit = $request->input('umur_bibit');
        $tanamanEvent->jumlah_pohon = $request->input('jumlah_pohon');
        $tanamanEvent->save();

        // Simpan data tambahan jika ada yang diunggah
        if ($request->has('car')) {
            foreach ($request->car as $data) {
                $dataTambahan = new DataTambahanEvent;
                $dataTambahan->event_id = $event->id;
                $file = $data['dokumen_tambahan']->store('folder_name'); // Folder untuk menyimpan file
                $dataTambahan->dokumen_tambahan = $file;
                $dataTambahan->nama_berkas = $data['nama_berkas'];
                $dataTambahan->save();
            }
        }
        return redirect('Profil')->with('success', 'Berhasil mengajukan Event');
    }
    function edit(Event $event)
    {
        // Pastikan pengguna yang sedang login adalah pemilik event
        if ($event->user_id !== Auth::id()) {
            return redirect('403');
        }
        $data['event'] = $event;
        return view('Penyelenggara.Event.edit', $data);
    }

    function update(Event $event, Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'nama_event.required' => 'Nama event wajib diisi.',
            'tanggal_event.required' => 'Tanggal event wajib diisi.',
            'tanggal_event.date' => 'Format tanggal event tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal event.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'jam.required' => 'Jam wajib diisi.',
            'jam.date_format' => 'Format jam tidak valid.',
            'target_peserta.required' => 'Target peserta wajib diisi.',
            'target_peserta.integer' => 'Target peserta harus berupa bilangan bulat.',
            'target_peserta.min' => 'Target peserta minimal 1 orang.',
            'batas_pendaftaran.required' => 'Batas pendaftaran wajib diisi.',
            'batas_pendaftaran.date' => 'Format batas pendaftaran tidak valid.',
            'foto.image' => 'File yang diunggah harus berupa gambar (jpeg, png, jpg, gif).',
            'foto.mimes' => 'File gambar harus berformat jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran file gambar maksimal 2048 KB.',
        ];

        // Aturan validasi
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string|max:255',
            'tanggal_event' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_event',
            'deskripsi' => 'required|string',
            'jam' => 'required|date_format:H:i:s', 
            'target_peserta' => 'required|integer|min:1',
            'batas_pendaftaran' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto event
        ], $messages);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update data event
        $event->nama_event = $request->input('nama_event');
        $event->tanggal_event = $request->input('tanggal_event');
        $event->tanggal_selesai = $request->input('tanggal_selesai');
        $event->deskripsi = $request->input('deskripsi');
        $event->jam = $request->input('jam');
        $event->target_peserta = $request->input('target_peserta');
        $event->batas_pendaftaran = $request->input('batas_pendaftaran');

        // Handle upload foto jika ada file yang diunggah
        if ($request->hasFile('foto')) {
            $event->handleUploadFoto();
        }

        // Simpan perubahan data
        $event->save();

        return redirect()->route('event.show', $event->id)->with('success', 'Data Berhasil Diedit');
    }
}
