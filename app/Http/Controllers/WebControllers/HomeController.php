<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Lokasi;
use App\Models\MonitoringEvent;
use App\Models\Tanaman;
use App\Models\TanamanEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        // Menghitung total pohon tertanam dari tabel TanamanEvent
        $totalPohonTertanam = TanamanEvent::sum('jumlah_pohon');

        // Menghitung event yang telah berlalu dan event mendatang
        $eventBerlalu = Event::where('tanggal_event', '<', now())->count();
        $eventMendatang = Event::where('tanggal_event', '>', now())->count();

        $totalPohonHidup = MonitoringEvent::sum('pohon_hidup');

        $data = [
            'total_pohon_hidup' => $totalPohonHidup,
            'list_tanaman' => Tanaman::all(),
            'list_event' => Event::all(),
            'total_pohon_tertanam' => $totalPohonTertanam,
            'eventBerlalu' => $eventBerlalu,
            'eventMendatang' => $eventMendatang,
        ];
        $list_lokasi = Lokasi::with(['events.tanaman_event'])->get();

        $list_lokasi->each(function ($lokasi) {
            $lokasi->total_pohon_ditanam = $lokasi->events->sum(function ($event) {
                return $event->tanaman_event->jumlah_pohon ?? 0;
            });
        });
        return view('Web.Home.index', $data, compact('list_lokasi'));
    }
}
