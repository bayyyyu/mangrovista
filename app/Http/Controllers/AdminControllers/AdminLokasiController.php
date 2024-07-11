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
}
