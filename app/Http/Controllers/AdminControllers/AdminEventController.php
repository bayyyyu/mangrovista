<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminEventController extends Controller
{
    function index(Request $request)
    {
        $data['list_event'] = Event::all();

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
    public function show($id)
    {
        $event = Event::find($id);   
        $data['event'] = $event;
        return view('Admin.Event.show', $data);
    }

    function edit($id)
    {
        $event = Event::find($id); 
        $data['event'] = $event;
        return view('Admin.Event.edit', $data);
    }

    function update(Event $event)
    {
        $messages = [
            'nama_event.required' => 'Nama event tidak boleh kosong.',
            'tanggal_event.required' => 'Field Tidak Boleh Kosong.',
            'tanggal_selesai.required' => 'Field Tidak Boleh Kosong.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal event.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
           
        ];

        $validator = Validator::make(request()->all(), [
            'nama_event' => 'sometimes|required|string|max:255',
            'tanggal_event' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_event',
            'target_peserta' => 'required|integer|min:1',
            'deskripsi' => 'sometimes|required|string',
            'jam' => 'sometimes|required|string',
            'foto' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (request('nama_event')) $event->nama_event = request('nama_event');
        if (request('tanggal_event')) $event->tanggal_event = request('tanggal_event');
        if (request('tanggal_selesai')) $event->tanggal_selesai = request('tanggal_selesai');
        if (request('deskripsi')) $event->deskripsi = request('deskripsi');
        if (request('jam')) $event->jam = request('jam');
        if (request('foto')) $event->handleUploadFoto();

        $event->save();

        return redirect('Admin/Event')->with('success', 'Data Berhasil Diedit');
    }

    function destroy(Event $event)
    {
        $event->delete();
        return redirect('Admin/Event')->with('danger', 'Data Berhasil Dihapus');
    }

    function dokumentasi(Event $event)
    {
        $data['event'] = $event;
        $list_dokumentasi = Dokumentasi::where('event_id', $event->id)->get();
        return view('Admin.Event.dokumentasi', $data, compact('list_dokumentasi'));
    }

    public function getMonitoringData($eventId)
    {
        $event = Event::with('monitoring_events')->findOrFail($eventId);
        return response()->json($event->monitoring_events);
    }
}
