<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Event;
use App\Models\Lokasi;
use App\Models\PendaftaranEvent;
use App\Models\Tanaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    function index(Request $request)
    {
        $user = User::all();
        $tanaman = Tanaman::with('eventPenanaman')->get();

        $list_event_telah_selesai = Event::where('tanggal_event', '<', now())->withCount('peserta')->get();

        $list_event_belum_selesai = Event::where('tanggal_event', '>', now())->withCount('peserta')->get();

        $list_event_berlangsung = Event::where('tanggal_event', '<=', now())->where('tanggal_selesai', '>=', now())->withCount('peserta')->get();

        return view('Web.Event.index', compact('user', 'tanaman', 'list_event_telah_selesai', 'list_event_belum_selesai', 'list_event_berlangsung'));
    }

    function show(Event $event)
    {
        $event = Event::with('monitoring_events')->findOrFail($event->id); 
        $event = Event::withCount('peserta')->findOrFail($event->id);
        $user = $event->user;
        $totalPengajuanEvent = Event::where('user_id', $user->id)->count();

        $lokasi = $event->lokasi;
        $data['event'] = $event;
        $data['total_pengajuan_event'] = $totalPengajuanEvent;
        $data['list_dokumentasi'] = Dokumentasi::where('event_id', $event->id)->get();
        return view('Web.Event.show', $data, compact('user', 'lokasi'));
    }
}
