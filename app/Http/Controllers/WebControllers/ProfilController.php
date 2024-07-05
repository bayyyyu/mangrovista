<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tanaman;
use App\Models\Event;
use App\Models\PendaftaranEvent;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\Response;


class ProfilController extends Controller
{
    function index()
    {
        $user = request()->user();
        $totalPengajuanEvent = Event::where('user_id', $user->id)->count();

        $list_event = Event::where('user_id', $user->id)->withCount('peserta')->paginate(3);

        $partisipasiEvents = PendaftaranEvent::where('user_id', $user->id)->with('event')->get();
        $totalPartisipasi = $partisipasiEvents->count(); 

        $data = [
            'list_role_request' => $user->role_request,
            'list_tanaman' => Tanaman::all(),
            'list_event' => $list_event,
            'user' => Auth::user(),
            'total_pengajuan_event' => $totalPengajuanEvent,
            'totalPartisipasi' => $totalPartisipasi,
        ];
        
        return view('Web.Profil.index', $data, compact('partisipasiEvents'));
    }
    function updatePengaturanAkun(User $user)
    {
        if (request('nama_lengkap')) $user->nama_lengkap = (request('nama_lengkap'));
        if (request('username')) $user->username = (request('username'));
        if (request('email')) $user->email = (request('email'));
        if (request('role')) $user->role = (request('role'));
        if (request('password')) $user->password = (request('password'));
        if (request('no_telpon')) $user->no_telpon = (request('no_telpon'));
        if (request('foto_profil')) $user->handleUploadFoto();
        $user->save();
        return redirect('Profil')->with('success', 'Data Berhasil Diedit');
    }
    public function generateQr($id)
    {
        $partisipasi = PendaftaranEvent::findOrFail($id);
        $event = $partisipasi->event;

        // Ekstraksi atribut penting dari event dan lokasi
        $eventNama = $event->nama_event;
        $eventTanggal = $event->tanggal_event ?? 'Tidak Diketahui';
        $lokasiNama = $event->lokasi->nama_lokasi ?? 'Tidak Diketahui';

        // Buat string data untuk QR code
        $qrData = "Event: {$eventNama}\n" .
            "Tanggal: {$eventTanggal}\n" .
            "Lokasi: {$lokasiNama}\n" .
            "Peserta: {$partisipasi->user->nama_lengkap}";

        // Buat QR code
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($qrData)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High) // Perhatikan penggunaan errorCorrectionLevel dengan huruf kecil
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin) // Perhatikan penggunaan roundBlockSizeMode dengan huruf kecil
            ->build();

        // Hasilkan dan kirim gambar QR code
        $response = new Response($result->getString());
        $response->headers->set('Content-Type', $result->getMimeType());

        return $response;
    }
}
