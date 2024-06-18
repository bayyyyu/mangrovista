<?php

namespace App\Http\Controllers\PenyelenggaraControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MonitoringEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class MonitoringController extends Controller
{
    function create($eventId = null){
        
        $event = Event::find($eventId);
        Log::info('Auth ID: ' . Auth::id());
        Log::info('Event User ID: ' . $event->user_id);

        // Pastikan pengguna yang sedang login adalah pemilik event
        if ($event->user_id !== Auth::id()) {
            return redirect('403');
        }
        return view('Penyelenggara.Update-Event.create', compact('event'));
    }

    function store(Request $request){
        $request->validate([
            'event_id' => 'required|exists:event,id',
            'tanggal_monitoring' => 'required|date',
            'monitoring_deskripsi' => 'required|string',
            'pohon_hidup' => 'required|integer',
            'pohon_mati' => 'required|integer',
            'diameter_pohon' => 'required|numeric',
            'tinggi_pohon' => 'required|numeric',
            'foto_monitoring' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // Membuat instance dari MonitoringEvent
        $monitoring_event = new MonitoringEvent();
        $monitoring_event->event_id = $request->event_id;
        $monitoring_event->tanggal_monitoring = $request->tanggal_monitoring;
        $monitoring_event->monitoring_deskripsi = $request->monitoring_deskripsi;
        $monitoring_event->pohon_hidup = $request->pohon_hidup;
        $monitoring_event->pohon_mati = $request->pohon_mati;
        $monitoring_event->diameter_pohon = $request->diameter_pohon;
        $monitoring_event->tinggi_pohon = $request->tinggi_pohon;
        $monitoring_event->handleUploadFoto();
        $monitoring_event->save();

        return redirect()->route('event.show', $request->event_id)->with('success', 'Data monitoring berhasil disimpan.');
    }
}
