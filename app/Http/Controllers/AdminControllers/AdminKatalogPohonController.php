<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\KatalogPohon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminKatalogPohonController extends Controller
{
    function index()
    {
        $data['list_katalog_pohon'] = KatalogPohon::all();
        return view('Admin.Katalog-Pohon.index', $data);
    }
    function create()
    {
        return view('Admin.Katalog-Pohon.create');
    }

    public function store(Request $request)
    {
        $katalog_pohon = new KatalogPohon();
        $katalog_pohon->nama_pohon = $request->input('nama_pohon');
        $katalog_pohon->nama_lain_pohon = $request->input('nama_lain_pohon');
        $katalog_pohon->deskripsi = $request->input('deskripsi');

        $katalog_pohon->handleUploadFoto();
        $katalog_pohon->save();

        return redirect('Admin/Katalog-Pohon')->with('success', 'Data berhasil ditambahkan.');
    }
    function show(KatalogPohon $katalog_pohon)
    {
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Admin.Katalog-Pohon.show', $data);
    }
    function edit(KatalogPohon $katalog_pohon)
    {
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Admin.Katalog-Pohon.edit', $data);
    }
    function update(KatalogPohon $katalog_pohon)
    {
        $katalog_pohon->nama_pohon = request('nama_pohon');
        $katalog_pohon->nama_lain_pohon = request('nama_lain_pohon');
        $katalog_pohon->deskripsi = request('deskripsi');
        if (request('foto')) $katalog_pohon->handleUploadFoto();
        $katalog_pohon->save();
        return redirect('Admin/Katalog-Pohon')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(KatalogPohon $katalog_pohon)
    {
        $katalog_pohon->delete();

        return redirect('Admin/Katalog-Pohon')->with('danger', 'Data Berhasil Dihapus');
    }

    function import()
    {
        return view('Admin.Katalog-Pohon.import');
    }
    function import_process(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // Ambil file yang di-upload
        $file = $request->file('file');

        // Baca data dari file Excel
        $data = Excel::toCollection(null, $file);

        // Ambil sheet pertama (jika ada lebih dari satu sheet)
        $sheet = $data->first();

        // Array untuk menyimpan referensi data pohon
        $katalogPohons = [];

        // Iterasi melalui data dan simpan ke database
        foreach ($sheet->slice(1) as $index => $row) { // Mulai iterasi dari baris kedua
            $katalogPohon = KatalogPohon::create([
                'nama_pohon' => $row[0],
                'nama_lain_pohon' => $row[1],
                'deskripsi' => $row[2],
            ]);

            // Simpan referensi ke dalam array
            $katalogPohons[$index] = $katalogPohon;
        }

        // $spreadsheet = IOFactory::load($file);
        // $sheet = $spreadsheet->getActiveSheet();

        // foreach ($sheet->getDrawingCollection() as $drawing) {
        //     $rowIndex = $drawing->getCoordinates()[1] - 2; // Menyesuaikan index untuk menghubungkan gambar dengan data pohon
        //     $katalogPohon = $katalogPohons[$rowIndex] ?? null;

        //     if ($katalogPohon) {
        //         if ($drawing instanceof MemoryDrawing) {
        //             ob_start();
        //             call_user_func(
        //                 $drawing->getRenderingFunction(),
        //                 $drawing->getImageResource()
        //             );
        //             $imageContents = ob_get_contents();
        //             ob_end_clean();
        //             switch ($drawing->getMimeType()) {
        //                 case MemoryDrawing::MIMETYPE_PNG:
        //                     $extension = 'png';
        //                     break;
        //                 case MemoryDrawing::MIMETYPE_GIF:
        //                     $extension = 'gif';
        //                     break;
        //                 case MemoryDrawing::MIMETYPE_JPEG:
        //                     $extension = 'jpg';
        //                     break;
        //             }
        //         } else {
        //             $zipReader = fopen($drawing->getPath(), 'r');
        //             $imageContents = '';
        //             while (!feof($zipReader)) {
        //                 $imageContents .= fread($zipReader, 1024);
        //             }
        //             fclose($zipReader);
        //             $extension = $drawing->getExtension();
        //         }

        //         $filename = $katalogPohon->id . "-" . time() . "-" . Str::random(5) . '.' . $extension;
        //         $destination = 'images/Katalog-Pohon/' . $filename;
        //         file_put_contents(public_path($destination), $imageContents);

        //         $katalogPohon->update(['foto' => $destination]);
        //     }
        // }

        return redirect('Admin/Katalog-Pohon')->with('success', 'Data Berhasil Diimpor');
    }
}
