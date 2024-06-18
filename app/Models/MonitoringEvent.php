<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MonitoringEvent extends Model
{
    protected $table = 'monitoring_event';
    protected $fillable =
    [
        'event_id',
        'tanggal_monitoring',
        'monitoring_deskripsi',
        'pohon_hidup', 'pohon_mati',
        'diameter_pohon',
        'foto_monitoring'
    ];
    use HasFactory;

    function event()
    {
        return $this->belongsTo(Event::class);
    }

    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto_monitoring')) {
            $foto_monitoring = request()->file('foto_monitoring');
            $destination = "images/Monitoring";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto_monitoring->extension();
            $url = $foto_monitoring->storeAs($destination, $filename);
            $this->foto_monitoring = "" . $url;
            $this->save();
        }
    }

    function handleDelete()
    {
        $foto_monitoring = $this->foto_monitoring;
        if ($foto_monitoring) {
            $path = public_path($foto_monitoring);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }
}
