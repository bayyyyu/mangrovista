<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $fillable = [
        'nama_lokasi',
        'alamat_lokasi',
        'foto_lokasi',
        'jenis_ekosistem',
        'lat',
        'lng',
    ];
    use HasFactory;
    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto_lokasi')) {
            $foto_lokasi = request()->file('foto_lokasi');
            $destination = "images/Lokasi";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto_lokasi->extension();
            $url = $foto_lokasi->storeAs($destination, $filename);
            $this->foto_lokasi = "" . $url;
            $this->save();
        }
    }

    function handleDelete()
    {
        $foto_lokasi = $this->foto_lokasi;
        if ($foto_lokasi) {
            $path = public_path($foto_lokasi);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }
    public function events()
    {
        return $this->hasMany(Event::class, 'lokasi_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($lokasi) {
            // Set lokasi_id menjadi NULL pada Event terkait
            $lokasi->events()->update(['lokasi_id' => null]);
        });
    }
}
