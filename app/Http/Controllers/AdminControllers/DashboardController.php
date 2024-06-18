<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;


class DashboardController extends Controller
{
    function index()
    {
        
        $tanaman = Tanaman::count();
        $event = Event::count();

        $totalEventSelesai = Event::where('tanggal_event', '<', now())->count();
        $totalEventBelumSelesai = Event::where('tanggal_event', '>', now())->count();
        $totalEventBerlangsung = Event::where('tanggal_event', '<=', now())
        ->where('tanggal_selesai', '>=', now())
        ->count();

        $totalPohonHidup = Tanaman::where('status_penanaman', 'hidup')->count();
        $totalPohonMati = Tanaman::where('status_penanaman', 'mati')->count();
        $totalPohonBaru = Tanaman::where('status_penanaman', 'baru ditanam')->count();


        return view('Admin.Dashboard.index', compact('tanaman','event', 'totalEventSelesai', 'totalEventBelumSelesai', 'totalEventBerlangsung','totalPohonHidup','totalPohonMati','totalPohonBaru'));
    }
}
