<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Lokasi;
use Illuminate\Http\Request;

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
}
