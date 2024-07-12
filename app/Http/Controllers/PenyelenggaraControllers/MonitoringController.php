<?php

namespace App\Http\Controllers\PenyelenggaraControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MonitoringEvent;
use App\Models\TanamanEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MonitoringController extends Controller
{
    function create($eventId = null)
    {

        $event = Event::find($eventId);
        Log::info('Auth ID: ' . Auth::id());
        Log::info('Event User ID: ' . $event->user_id);

        // Pastikan pengguna yang sedang login adalah pemilik event
        if ($event->user_id !== Auth::id()) {
            return redirect('403');
        }
        return view('Penyelenggara.Update-Event.create', compact('event'));
    }

    public function store(Request $request)
    {
        // Ambil data jumlah pohon dari event
        $tanaman_event = TanamanEvent::where('event_id', $request->event_id)->first();

        // Jika event tidak ditemukan, kembalikan error
        if (!$tanaman_event) {
            return redirect()->back()->withErrors(['event_id' => 'Event tidak ditemukan.'])->withInput();
        }

        // Jumlah pohon yang ditanam
        $jumlah_pohon = $tanaman_event->jumlah_pohon;

        // Custom validation rules
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:event,id',
            'tanggal_monitoring' => 'required|date',
            'monitoring_deskripsi' => 'required|string',
            'pohon_hidup' => 'required|integer',
            'pohon_mati' => 'required|integer',
            'diameter_pohon' => 'required|numeric',
            'tinggi_pohon' => 'required|numeric',
            'foto_monitoring' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $validator->after(function ($validator) use ($jumlah_pohon, $request) {
            $pohon_hidup = $request->pohon_hidup;
            $pohon_mati = $request->pohon_mati;

            // Jumlah pohon hidup + pohon mati tidak boleh melebihi jumlah pohon yang ditanam
            if (($pohon_hidup + $pohon_mati) > $jumlah_pohon) {
                $validator->errors()->add('pohon_hidup', 'Jumlah pohon hidup dan pohon mati tidak boleh melebihi jumlah pohon yang ditanam.');
                $validator->errors()->add('pohon_mati', 'Jumlah pohon hidup dan pohon mati tidak boleh melebihi jumlah pohon yang ditanam.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
