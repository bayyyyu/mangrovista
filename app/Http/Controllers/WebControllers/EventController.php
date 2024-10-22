<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Event;
use App\Models\Lokasi;
use App\Models\PendaftaranEvent;
use App\Models\Tanaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    function index(Request $request)
    {
        $user = User::all();
        // $tanaman = Tanaman::with('eventPenanaman')->get();

        $list_event_telah_selesai = Event::where('tanggal_event', '<', now())->withCount('peserta')->get();

        $list_event_belum_selesai = Event::where('tanggal_event', '>', now())->withCount('peserta')->get();

        $list_event_berlangsung = Event::where('tanggal_event', '<=', now())->where('tanggal_selesai', '>=', now())->withCount('peserta')->get();

        return view('Web.Event.index', compact('user',  'list_event_telah_selesai', 'list_event_belum_selesai', 'list_event_berlangsung'));
    }

    function show(Event $event)
    {
        $event = Event::with(['monitoring_events', 'tanaman_event', 'peserta'])
        ->withCount('peserta')
        ->findOrFail($event->id);

        // Hitung umur tanaman saat ini
        if ($event->tanggal_event < now()) {
            $umurDalamBulan = Carbon::parse($event->tanggal_event)->diffInMonths(Carbon::now()) + $event->tanaman_event->umur_bibit;
            $event->umur_tanaman_saat_ini = $this->formatUmurTanaman($umurDalamBulan);
        } else {
            $event->umur_tanaman_saat_ini = '-';
        }

        $user = $event->user;
        $totalPengajuanEvent = Event::where('user_id', $user->id)->count();

        $lokasi = $event->lokasi;
        $data['event'] = $event;
        $data['total_pengajuan_event'] = $totalPengajuanEvent;
        $data['list_dokumentasi'] = Dokumentasi::where('event_id', $event->id)->get();

        return view('Web.Event.show', $data, compact('user', 'lokasi'));
    }

    private function formatUmurTanaman($umurDalamBulan)
    {
        if ($umurDalamBulan >= 12) {
            $tahun = intdiv($umurDalamBulan, 12);
            $bulan = $umurDalamBulan % 12;
            return "{$tahun} tahun" . ($bulan > 0 ? " {$bulan} bulan" : "");
        }
        return "{$umurDalamBulan} bulan";
    }
}
