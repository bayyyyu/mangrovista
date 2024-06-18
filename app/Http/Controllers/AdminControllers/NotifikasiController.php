<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    function index()
    {
        $data['list_notifikasi'] = Notifikasi::all();
        return view('components.layout.header', $data);
    }
}
