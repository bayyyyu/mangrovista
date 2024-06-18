<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TanamanController extends Controller
{
    function index()
    {
        $data['list_tanaman'] = Tanaman::all();
        $data['list_event'] = Event::all();
        return view('Admin.Tanaman.index', $data);
    }
    function create()
    {
        $list_event = Event::all();
        return view('Admin.Tanaman.create', compact('list_event'));
    }
    function store(Request $request)
    {
        if (Auth::check()) {
            Session::flash('lokasi', $request->lokasi);
            Session::flash('umur_tanaman', $request->umur_tanaman);
            Session::flash('lat', $request->lat);
            Session::flash('lng', $request->lng);
            Session::flash('deskripsi', $request->deskripsi);
            Session::flash('sample', $request->sample);
            Session::flash('tanggal_penanaman', $request->tanggal_penanaman);
            Session::flash('jenis_mangrove', $request->jenis_mangrove);
            Session::flash('jenis_tanah', $request->jenis_tanah);
            Session::flash('masa_tumbuh', $request->masa_tumbuh);

            $request->validate([
                'lokasi' => 'required',
                'umur_tanaman' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'deskripsi' => 'required',
                'tanggal_penanaman' => 'required',
                'jenis_mangrove' => 'required',
                'jenis_tanah' => 'required',
                'masa_tumbuh' => 'required',
                'event_id' => 'required',
            ], [
                'lokasi.required' => 'Lokasi Wajib Diisi',
                'umur_tanaman.required' => 'Umur Tanaman Saat Ditanam Wajib Diisi',
                'lat.required' => 'latitude Wajib Diisi',
                'lng.required' => 'longitude Wajib Diisi',
                'deskripsi.required' => 'deskripsi Wajib Diisi',
                'tanggal_penanaman.required' => 'Tanggal Penanaman Wajib Diisi',
                'jenis_mangrove.required' => 'Jenis Mangrove Wajib Diisi',
                'jenis_tanah.required' => 'Jenis Tanah Wajib Diisi',
                'masa_tumbuh.required' => 'Masa Tumbuh Wajib Diisi',
                'even_id.required' => 'Event Penanaman Wajib Diisi',

            ]);


            // memeriksa apakah pengguna sudah login
            $tanaman = new Tanaman;
            $tanaman->sample = Str::random(7);
            $tanaman->tanggal_penanaman = request('tanggal_penanaman');
            $tanaman->jenis_mangrove = request('jenis_mangrove');
            $tanaman->jenis_tanah = request('jenis_tanah');
            $tanaman->masa_tumbuh = request('masa_tumbuh');
            $tanaman->lokasi = request('lokasi');
            $tanaman->umur_tanaman = request('umur_tanaman');
            $tanaman->lat = request('lat');
            $tanaman->lng = request('lng');
            $tanaman->deskripsi = request('deskripsi');
            $tanaman->event_id = request('event_id');
            $tanaman->status_penanaman = "baru ditanam";
            $tanaman->user_id = Auth::user()->id;

            $tanaman->handleUploadFoto();
            $tanaman->save();

            return redirect('Admin/Tanaman')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('Auth/Login')->with('error', 'Anda harus login terlebih dahulu');
        }
    }

    function show(Tanaman $tanaman)
    {
        $data['tanaman'] = $tanaman;
        return view('Admin.Tanaman.show', $data);
    }

    function edit(Tanaman $tanaman, Event $event)
    {
        $list_event = Event::all();
        $data['tanaman'] = $tanaman;
        $data['event'] = $event;
        return view('Admin.Tanaman.edit', compact('list_event'), $data);
    }

    function update(Tanaman $tanaman)
    {
        if (request('sample')) $tanaman->sample = (request('sample'));
        if (request('tanggal_penanaman')) $tanaman->tanggal_penanaman = (request('tanggal_penanaman'));
        if (request('jenis_mangrove')) $tanaman->jenis_mangrove = (request('jenis_mangrove'));
        if (request('jenis_tanah')) $tanaman->jenis_tanah = (request('jenis_tanah'));
        if (request('masa_tumbuh')) $tanaman->masa_tumbuh = (request('masa_tumbuh'));
        if (request('lokasi')) $tanaman->lokasi = (request('lokasi'));
        if (request('umur_tanaman')) $tanaman->umur_tanaman = (request('umur_tanaman'));
        if (request('lat')) $tanaman->lat = (request('lat'));
        if (request('lng')) $tanaman->lng = (request('lng'));
        if (request('deskripsi')) $tanaman->deskripsi = (request('deskripsi'));
        if (request('event_id')) $tanaman->event_id = (request('event_id'));
        $tanaman->status_penanaman = request('status_penanaman');
        // $tanaman->event_id = request('event_id');
        $tanaman->user_id = Auth::user()->id;

        if (request('foto')) $tanaman->handleUploadFoto();
        $tanaman->save();

        return redirect('Admin/Tanaman')->with('success', 'Data Berhasil Diedit');
    }
    function import()
    {
        return view('Admin.Tanaman.import');
    }
    function import_process(Request $request, Tanaman $tanaman)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // Ambil file yang di-upload
        $file = $request->file('file');

        // Load file Excel menggunakan PHPExcel
        $reader = IOFactory::createReaderForFile($file);
        $spreadsheet = $reader->load($file);

        // Ambil sheet pertama
        $sheet = $spreadsheet->getActiveSheet();

        // Iterasi melalui data dan simpan ke database
        foreach ($sheet->getRowIterator() as $row) {
            // Skip header
            if ($row->getRowIndex() === 1) {
                continue;
            }

            // Ambil nilai kolom
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }

            // Konversi nilai tanggal dari Excel ke format PHP
            $excelDate = $rowData[1];
            $tanggalPenanaman = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelDate));

            Tanaman::create([
                'lokasi' => $rowData[0], // Indeks kolom 'nama_pohon'
                'tanggal_penanaman' => $tanggalPenanaman, // Gunakan nilai tanggal yang sudah dikonversi
                'jenis_mangrove' => $rowData[2],
                'jenis_tanah' => $rowData[3],
                'masa_tumbuh' => $rowData[4],
                'umur_tanaman' => $rowData[5],
                'deskripsi' => $rowData[6],
                'lat' => $rowData[7],
                'lng' => $rowData[8],
                'event_id' => $request->input('event_id'),
                'status_penanaman' => 'baru ditanam',
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect('Admin/Tanaman')->with('success', 'Data Berhasil Diimpor');
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



    function destroy(Tanaman $tanaman)
    {
        $tanaman->delete();

        return redirect('Admin/Tanaman')->with('danger', 'Data Berhasil Dihapus');
    }
}
