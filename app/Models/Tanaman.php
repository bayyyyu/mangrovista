<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;

class Tanaman extends Model
{
    protected $table = 'tanaman';
    protected $fillable = 
    [
        'id', 'lokasi','sample','tanggal_penanaman','jenis_mangrove', 'jenis_tanah','status_penanaman','deskripsi',
        'masa_tumbuh', 'umur_tanaman', 'lat', 'lng', 'user_id', 'foto', 'event_id', 'nama_event'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/Tanaman";
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

    public function eventPenanaman()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function countLiveStatusByEventId($eventId)
    {
        $count = Tanaman::where('event_id', $eventId)
            ->where('status_penanaman', 'hidup')
            ->count();

        return $count;
    }
    function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
