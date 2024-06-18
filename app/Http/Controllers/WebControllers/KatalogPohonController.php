<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\KatalogPohon;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatalogPohonController extends Controller
{
    function index()
    {
        $katalogPohon = DB::table('katalog_pohon')->get();
        $data['list_katalog_pohon'] = KatalogPohon::all();
        return view('Web.Katalog-Pohon.index', $data, ['katalogPohon' => $katalogPohon]);
    }
    public function getDeskripsiPohon($id)
    {
        $pohon = KatalogPohon::find($id);

        if ($pohon) {
            $deskripsi = $pohon->deskripsi;
            return response()->json(['deskripsi' => $deskripsi]);
        } else {
            return response()->json(['error' => 'Pohon tidak ditemukan'], 404);
        }
    }
    function show(KatalogPohon $katalog_pohon)
    {
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Web.Katalog-Pohon.show', $data);
    }
}
