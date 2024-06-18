<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TanamController extends Controller
{
    function index()
    {
        $data['list_tanaman'] = Tanaman::all();
        $data['list_event'] = Event::all();
        $data['list_tanaman'] = Tanaman::with('eventPenanaman')->paginate(6);
        return view('Web.Penanaman.index', $data);
    }
    function show(Tanaman $tanaman){
        $data['tanaman'] = $tanaman;
        $data['recent_upload'] = Tanaman::orderBy('id', 'DESC')->take(5)->get();
        return view('Web.Penanaman.show',$data);
    }
}
