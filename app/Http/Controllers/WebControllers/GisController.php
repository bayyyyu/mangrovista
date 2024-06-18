<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Lokasi;
use App\Models\Tanaman;
use Illuminate\Http\Request;



class GisController extends Controller
{
    function index(Request $request){

        $list_event = Event::all();
        $data ['list_lokasi'] = Lokasi::all();

        // Ambil tahun-tahun unik dari tanggal-tanggal event
        $years = [];
        foreach ($list_event as $event) {
            $year = date('Y', strtotime($event->tanggal_event));
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
        }
        $selectedYear = $request->input('year');
        if ($year == 'all') {
            $list_event = Event::all(); // Jika dipilih "Semua Tahun", ambil semua event
        } else {
            $list_event = $list_event->where('tahun', $selectedYear);// Jika dipilih tahun tertentu, ambil event yang memiliki tahun tersebut
        }
        $tanaman = Tanaman::with('eventPenanaman')->get();
        $data['list_tanaman'] = Tanaman::all();
        $data['list_event'] = Event::all();
        return view('Web.GIS.index6', compact('tanaman','years', 'selectedYear'), $data);
    }
}
