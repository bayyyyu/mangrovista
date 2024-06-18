<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\PendaftaranEvent;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    function create(Event $event){
        $data['event'] = $event;
        return view('Web.Event.Pendaftaran.create', $data);
    }
    function store(Request $request){

        $user = auth()->user();

        $pendaftaran_event = new PendaftaranEvent();

        $pendaftaran_event->user_id = $user->id;
        $pendaftaran_event->event_id = $request->event_id;
        $pendaftaran_event->save();
        return redirect('Event')->with('success', 'Pendaftarn event berhasil.');
    }
}
