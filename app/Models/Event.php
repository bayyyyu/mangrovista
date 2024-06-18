<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tanaman;
use App\Models\User;
use App\Models\PendaftaranEvent;
use Illuminate\Support\Str;


class Event extends Model
{
    protected $table = 'event';
    protected $fillable = ['id', 'user_id', 'lokasi_id', 'nama_event', 'tanggal_event', 'deskripsi', 'foto', 'jam', 'lat', 'lng'];

    public function forms()
    {
        return $this->hasMany(Tanaman::class, 'event_id');
    }

    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/Event";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "" . $url;
            $this->save();
        }
    }

    function handleDelete()
    {
        $foto = $this->foto;
        if ($foto) {
            $path = public_path($foto);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }
    function handleUploadFotoDokumentasi()
    {

        $this->handleDelete();
        if (request()->hasFile('foto_dokumentasi')) {
            $foto_dokumentasi = request()->file('foto_dokumentasi');
            $destination = "images/Event/Foto Dokumentasi";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto_dokumentasi->extension();
            $url = $foto_dokumentasi->storeAs($destination, $filename);
            $this->foto_dokumentasi = "" . $url;
            $this->save();
        }
    }

    function handleDeleteDokumentasi()
    {
        $foto_dokumentasi = $this->foto_dokumentasi;
        if ($foto_dokumentasi) {
            $path = public_path($foto_dokumentasi);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function data_tambahan_event()
    {
        return $this->hasMany(DataTambahanEvent::class);
    }

    //peserta(pendaftaram) star//
    public function peserta()
    {
        return $this->hasMany(PendaftaranEvent::class, 'event_id');
    }
    public function isUserRegistered($userId)
    {
        return $this->peserta()->where('user_id', $userId)->exists();
    }
    public function pesertaCount()
    {
        return $this->peserta()->count();
    }
    //peserta(pendaftaram) star//

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function tanaman_event()
    {
        return $this->hasOne(TanamanEvent::class);
    }

    public function monitoring_events()
    {
        return $this->hasMany(MonitoringEvent::class, 'event_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            $event->tanamans()->each(function ($tanaman) {
                $tanaman->delete();
            });
        });
    }
}
