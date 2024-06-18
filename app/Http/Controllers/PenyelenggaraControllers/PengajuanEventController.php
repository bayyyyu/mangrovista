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
        Log::info('Auth ID: ' . Auth::id());
        Log::info('Event User ID: ' . $event->user_id);

        // Pastikan pengguna yang sedang login adalah pemilik event
        if ($event->user_id !== Auth::id()) {
            return redirect('403');
        }
        $data['event'] = $event;
        return view('Penyelenggara.Event.edit', $data);
    }

    function update(Event $event)
    {
        if (request('nama_event')) $event->nama_event = (request('nama_event'));
        if (request('tanggal_event')) $event->tanggal_event = (request('tanggal_event'));
        if (request('tanggal_selesai')) $event->tanggal_selesai = (request('tanggal_selesai'));
        if (request('deskripsi')) $event->deskripsi = (request('deskripsi'));
        if (request('jam')) $event->jam = (request('jam'));
        if (request('target_peserta')) $event->target_peserta = (request('target_peserta'));
        if (request('batas_pendaftaran')) $event->batas_pendaftaran = (request('batas_pendaftaran'));
        if (request('foto')) $event->handleUploadFoto();

        $event->save();
        return redirect()->route('event.show', $event->id)->with('success', 'Data Berhasil Diedit');
    }
    
}
