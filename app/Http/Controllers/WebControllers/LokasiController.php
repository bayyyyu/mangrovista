<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{
    function index(Lokasi $lokasi)
    {
        $list_event = Event::all();
        $list_lokasi = Lokasi::with(['events.tanaman_event'])->get();

        $list_lokasi->each(function ($lokasi) {
            $lokasi->total_pohon_ditanam = $lokasi->events->sum(function ($event) {
                return $event->tanaman_event->jumlah_pohon ?? 0;
            });
        });

        return view('Web.Lokasi-Penanaman.index', compact('list_lokasi', 'list_event'));
    }

    public function show($id)
    {
        $lokasi = Lokasi::find($id);

        // Hitung total event di lokasi tersebut
        $totalEvent = $lokasi->events()->count();

        // Hitung jumlah pohon yang ditanam di lokasi tersebut
        $totalPohonDitanam = $lokasi->events()->with('tanaman_event')->get()->sum(function ($event) {
            return $event->tanaman_event->jumlah_pohon ?? 0;
        });

        // Hitung jumlah pohon hidup di lokasi tersebut
        $totalPohonHidup = $lokasi->events()->with('monitoring_events')->get()->sum(function ($event) {
            return $event->monitoring_events->sum('pohon_hidup') ?? 0;
        });

        // untok Hitung panjang isian dari progresbar ny
        $percentage =
            $totalPohonDitanam > 0
            ? ($totalPohonHidup / $totalPohonDitanam) * 100
            : 0;

        $data['list_event'] = Event::where('lokasi_id', $lokasi->id)->get();
        $data['lokasi'] = $lokasi;
        $data['totalEvent'] = $totalEvent;
        $data['totalPohonDitanam'] = $totalPohonDitanam;
        $data['totalPohonHidup'] = $totalPohonHidup;

        return view('Web.Lokasi-Penanaman.show', $data, compact('percentage'));
    }
}
