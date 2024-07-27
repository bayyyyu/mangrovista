<?php

namespace App\Http\Controllers\PenyelenggaraControllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class DokumentasiController extends Controller
{
    function create(Event $event){

        // Pastikan pengguna yang sedang login adalah pemilik event
        if ($event->user_id !== Auth::id()) {
            return redirect('403');
        }
        $data['event'] = $event;
        return view('Penyelenggara.Event.dokumentasi', $data);
    }
    function store(Request $request, Event $event)
    {
        // Memastikan apakah ada data dalam 'dokumentasi'
        if ($request->has('dokumentasi')) {
            foreach ($request->dokumentasi as $index => $data) {
                // Membuat instance Dokumentasi baru
                $dokumentasi_event = new Dokumentasi();
                $dokumentasi_event->event_id = $event->id;

                // Menyimpan deskripsi dari 'dokumentasi' array
                if (isset($data['deskripsi'])) {
                    $dokumentasi_event->deskripsi = $data['deskripsi'];
                }

                // Mengambil file dari 'dokumentasi' array dan menggunakan metode handleUploadFile dari model
                if (isset($data['file'])) {
                    $file = $data['file'];
                    $dokumentasi_event->handleUploadFile($file);
                }
                
                // Menyimpan data ke database untuk mendapatkan ID
                $dokumentasi_event->save();

            }
        }
        return redirect('Event/' . $event->id)->with('success', 'Dokumentasi berhasil diunggah.');
    }
}
