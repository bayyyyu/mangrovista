<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GeoJsonController extends Controller
{
    public function index()
    {
        $directory = public_path('assets-sig/assets/shape/Desa/Geo'); // Sesuaikan dengan direktori Anda
        $files = File::files($directory);
        $geojsonFiles = [];

        foreach ($files as $file) {
            if ($file->getExtension() === 'geojson') {
                $geojsonFiles[] = $file->getFilename();
            }
        }

        return response()->json($geojsonFiles);
    }
}
