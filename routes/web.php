<?php

use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\TanamanController;
use App\Http\Controllers\AdminControllers\UserController;
use App\Http\Controllers\AdminControllers\AdminEventController;
use App\Http\Controllers\AdminControllers\AdminKatalogPohonController;
use App\Http\Controllers\AdminControllers\AdminLokasiController;
use App\Http\Controllers\AdminControllers\NotifikasiController;
use App\Http\Controllers\AdminControllers\PengajuanPeranController;
use App\Http\Controllers\PenyelenggaraControllers\DokumentasiController;
use App\Http\Controllers\PenyelenggaraControllers\LokasiEventController;
use App\Http\Controllers\PenyelenggaraControllers\MonitoringController;
use App\Http\Controllers\WebControllers\AboutController;
use App\Http\Controllers\WebControllers\ErrorController;
use App\Http\Controllers\WebControllers\EventController;
use App\Http\Controllers\WebControllers\GisController;
use App\Http\Controllers\WebControllers\HomeController;
use App\Http\Controllers\WebControllers\InformasiController;
use App\Http\Controllers\WebControllers\KatalogPohonController;
use App\Http\Controllers\WebControllers\PenanamanController;
use App\Http\Controllers\WebControllers\ProfilController;
use App\Http\Controllers\PenyelenggaraControllers\PengajuanEventController;
use App\Http\Controllers\WebControllers\GeoJsonController;
use App\Http\Controllers\WebControllers\LokasiController;
use App\Http\Controllers\WebControllers\PendaftaranController;
use App\Http\Controllers\WebControllers\PetaController;
use App\Http\Controllers\WebControllers\RoleRequestController;
use App\Http\Controllers\WebControllers\TanamController;
use App\Http\Controllers\WebControllers\UploadDataPenanamanController;
use App\Models\Dokumentasi;
use App\Models\MonitoringEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('');
});


// Auth
Route::get('Login', [AuthController::class, 'showLogin'])->middleware('isTamu');
Route::post('Login', [AuthController::class, 'loginProcess'])->middleware('isTamu');
Route::get('Logout', [AuthController::class, 'logout']);
Route::get('Register', [AuthController::class, 'register'])->middleware('isTamu');
Route::post('Register', [AuthController::class, 'createAcount'])->middleware('isTamu');
// Auth::routes(['verify' => true]);


// Dashboard
Route::get('Admin/Dashboard', [DashboardController::class, 'index'])->middleware('isError');

// katalog pohon
Route::get('Admin/Katalog-Pohon', [AdminKatalogPohonController::class, 'index'])->middleware('isError');
Route::get('Admin/Katalog-Pohon/create', [AdminKatalogPohonController::class, 'create'])->middleware('isError');
Route::post('Admin/Katalog-Pohon', [AdminKatalogPohonController::class, 'store'])->middleware('isError');
Route::get('Admin/Katalog-Pohon/{katalog_pohon}', [AdminKatalogPohonController::class, 'show'])->middleware('isError');
Route::get('Admin/Katalog-Pohon/{katalog_pohon}/edit', [AdminKatalogPohonController::class, 'edit'])->middleware('isError');
Route::put('Admin/Katalog-Pohon/{katalog_pohon}', [AdminKatalogPohonController::class, 'update'])->middleware('isError');
Route::delete('Admin/Katalog-Pohon/{katalog_pohon}', [AdminKatalogPohonController::class, 'destroy'])->middleware('isError');
// Route::get('Admin/Katalog-Pohon/import', [AdminKatalogPohonController::class, 'import'])->middleware('isError');
// Route::post('Admin/Katalog-Pohon', [AdminKatalogPohonController::class, 'import_process'])->middleware('isError');

// Tanaman
Route::get('Admin/Tanaman', [TanamanController::class, 'index'])->middleware('isError');
Route::get('Admin/Tanaman/create', [TanamanController::class, 'create'])->middleware('isError');
Route::post('Admin/Tanaman', [TanamanController::class, 'store'])->middleware('isError');
Route::get('Admin/Tanaman/{tanaman}', [TanamanController::class, 'show'])->middleware('isError');
Route::get('Admin/Tanaman/{tanaman}/edit', [TanamanController::class, 'edit'])->middleware('isError');
Route::put('Admin/Tanaman/{tanaman}', [TanamanController::class, 'update'])->middleware('isError');
Route::delete('Admin/Tanaman/{tanaman}', [TanamanController::class, 'destroy'])->middleware('isError');
Route::get('Admin/Tanaman/import', [TanamanController::class, 'import'])->middleware('isError');
Route::post('Admin/Tanaman', [TanamanController::class, 'import_process'])->middleware('isError');

// event
Route::get('Admin/Event', [AdminEventController::class, 'index'])->middleware('isError');
Route::get('Admin/Event/create', [AdminEventController::class, 'create'])->middleware('isError');
Route::post('Admin/Event', [AdminEventController::class, 'store'])->middleware('isError');
Route::get('Admin/Event/{event}', [AdminEventController::class, 'show'])->middleware('isError');
Route::get('Admin/Event/{event}/edit', [AdminEventController::class, 'edit'])->middleware('isError');
Route::get('Admin/Event/{event}/Dokumentasi', [AdminEventController::class, 'dokumentasi'])->middleware('isError');
Route::get('/Admin/Event/{event}/Monitoring/Data', [AdminEventController::class, 'getMonitoringData'])->middleware('isError');

Route::put('Admin/Event/{event}', [AdminEventController::class, 'update'])->middleware('isError');
Route::delete('Admin/Event/{event}', [AdminEventController::class, 'destroy'])->middleware('isError');
Route::put('Admin/Event/{event}/reject', [AdminEventController::class, 'reject'])->middleware('isError');
Route::put('Admin/Event/{event}/confirm', [AdminEventController::class, 'konfirm'])->middleware('isError');

//Lokasi
Route::get('Admin/Lokasi', [AdminLokasiController::class, 'index'])->middleware('isError');
Route::get('Admin/Lokasi/{lokasi}', [AdminLokasiController::class, 'show'])->middleware('isError');

// User
Route::get('Admin/User', [UserController::class, 'index'])->middleware('isError');
Route::get('Admin/User/create', [UserController::class, 'create'])->middleware('isError');
Route::post('Admin/User', [UserController::class, 'store'])->middleware('isError');
Route::get('Admin/User/{user}', [UserController::class, 'show'])->middleware('isError');
Route::get('Admin/User/{user}/edit', [UserController::class, 'edit'])->middleware('isError');
Route::put('Admin/User/{user}', [UserController::class, 'update'])->middleware('isError');
Route::delete('Admin/User/{user}', [UserController::class, 'destroy'])->middleware('isError');

//Pengajuan-Peran
Route::get('Admin/Pengajuan-Peran', [PengajuanPeranController::class, 'index'])->middleware('isError');
Route::get('Admin/Pengajuan-Peran/{role_request}', [PengajuanPeranController::class, 'show'])->middleware('isError');
Route::put('Admin/Pengajuan-Peran/{role_request}/reject', [PengajuanPeranController::class, 'reject'])->middleware('isError');
Route::put('Admin/Pengajuan-Peran/{role_request}/confirm', [PengajuanPeranController::class, 'konfirm'])->middleware('isError');
Route::delete('Admin/Pengajuan-Peran/{role_request}', [PengajuanPeranController::class, 'destroy'])->middleware('isError');



//Error
Route::get('404', [ErrorController::class, 'index_404']);
Route::get('403', [ErrorController::class, 'index_403']);


//Web/Home
Route::get('/', [HomeController::class, 'index']);
Route::get('Home', [HomeController::class, 'index']);



//Web/Katalog Pohon
Route::get('Katalog-Pohon', [KatalogPohonController::class, 'index']);
Route::get('/getDeskripsiPohon/{id}', [KatalogPohonController::class, 'getDeskripsiPohon']);
Route::get('/Katalog-Pohon/{katalog_pohon}', [KatalogPohonController::class, 'show']);


//Web/Event
Route::get('Event', [EventController::class, 'index']);
Route::get('Event/{event}', [EventController::class, 'show'])->name('event.show');

//Dafatar sebagai peserta event 
Route::get('Event/{event}/Daftar', [PendaftaranController::class, 'create']);
Route::post('Event', [PendaftaranController::class, 'store']);


//Web/Tanam
Route::get('Penanaman', [TanamController::class, 'index']);
Route::get('Penanaman/{tanaman}', [TanamController::class, 'show']);

//Web/Lokasi Penanaman
Route::get('Peta', [PetaController::class, 'index']);

//Web/Lokasi Penanaman
Route::get('Lokasi-Penanaman', [LokasiController::class, 'index']);
Route::get('Lokasi-Penanaman/{lokasi}/{nama_lokasi}', [LokasiController::class, 'show']);
Route::get('/geojson-files', [GeoJsonController::class, 'index']);

//Web/Profil
Route::get('Profil', [ProfilController::class, 'index']);
Route::put('Profil/{user}', [ProfilController::class, 'updatePengaturanAkun']);
Route::get('Event/{event}/Upload', [UploadDataPenanamanController::class, 'index']);
Route::get('generate-qr/{id}', [ProfilController::class, 'generateQr'])->name('generate.qr');

//Web/Ambil Peran
Route::middleware(['auth'])->group(function () {
    Route::get('Ambil-Peran/create', [RoleRequestController::class, 'create']);
    Route::post('Ambil-Peran', [RoleRequestController::class, 'store']);
    Route::get('Ambil-Peran/{role_request}/edit', [RoleRequestController::class, 'edit']);
    Route::put('Ambil-Peran/{role_request}', [RoleRequestController::class, 'update']);
});



// Penyelenggara Event
Route::middleware(['role:penyelenggara'])->group(function () {
    Route::get('Pengajuan-Event/create', [PengajuanEventController::class, 'create']);
    Route::post('Pengajuan-Event', [PengajuanEventController::class, 'store']);
    Route::get('Event/{event}/edit', [PengajuanEventController::class, 'edit']);
    Route::put('Event/{event}', [PengajuanEventController::class, 'update']);

    // Penyelenggara Update (Monitoring) Event
    Route::get('Event/{event}/monitoring', [MonitoringController::class, 'create']);
    Route::post('Event/{event}/monitoring_store', [MonitoringController::class, 'store'])->name('monitoring.store');

    // Penyelenggara Lokasi
    Route::get('Pengajuan-Event/Lokasi', [LokasiEventController::class, 'create']);
    Route::post('Pengajuan-Event/create', [LokasiEventController::class, 'store']);

    // Penyelenggara Dokumentasi event
    Route::get('Event/{event}/dokumentasi', [DokumentasiController::class, 'create']);
    Route::post('Event/{event}', [DokumentasiController::class, 'store']);
});
