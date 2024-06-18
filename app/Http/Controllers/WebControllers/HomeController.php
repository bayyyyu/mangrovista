<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $tanaman = Tanaman::count();
        $eventBerlalu = Event::where('tanggal_event', '<', now())->count();
        $eventMendatang = Event::where('tanggal_event', '>', now())->count();

        // Menghitung jumlah status_penanaman "hidup" untuk semua penanaman
        $jumlah_pohon_hidup = Tanaman::where('status_penanaman', 'hidup')->count();
        $data['jumlah_pohon_hidup'] = $jumlah_pohon_hidup;
        $data['list_tanaman'] = Tanaman::all();
        $data['list_event'] = Event::all();
        
        return view('Web.Home.index', compact('tanaman','eventBerlalu','eventMendatang', 'jumlah_pohon_hidup'), $data);
    }
}
