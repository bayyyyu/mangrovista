<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\KatalogPohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $messages = [
            'nama_pohon.required' => 'Nama pohon wajib diisi.',
            'nama_lain_pohon.required' => 'Nama lain pohon wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.required' => 'foto wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_pohon' => 'required|string|max:255',
            'nama_lain_pohon' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $katalog_pohon = new KatalogPohon();
        $katalog_pohon->nama_pohon = $request->input('nama_pohon');
        $katalog_pohon->nama_lain_pohon = $request->input('nama_lain_pohon');
        $katalog_pohon->deskripsi = $request->input('deskripsi');

        $katalog_pohon->handleUploadFoto();
        $katalog_pohon->save();

        return redirect('Admin/Katalog-Pohon')->with('success', 'Data berhasil ditambahkan.');
    }

    function show($id)
    {
        $katalog_pohon = KatalogPohon::find($id);
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Admin.Katalog-Pohon.show', $data);
    }
    function edit($id)
    {
        $katalog_pohon = KatalogPohon::find($id);
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Admin.Katalog-Pohon.edit', $data);
    }
    public function update(Request $request, KatalogPohon $katalog_pohon)
    {
        $messages = [
            'nama_pohon.required' => 'Nama pohon wajib diisi.',
            'nama_lain_pohon.required' => 'Nama lain pohon wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_pohon' => 'required|string|max:255',
            'nama_lain_pohon' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $katalog_pohon->nama_pohon = $request->input('nama_pohon');
        $katalog_pohon->nama_lain_pohon = $request->input('nama_lain_pohon');
        $katalog_pohon->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('foto')) {
            $katalog_pohon->handleUploadFoto();
        }

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


        return redirect('Admin/Katalog-Pohon')->with('success', 'Data Berhasil Diimpor');
    }
}
