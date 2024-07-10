<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KatalogPohon extends Model
{
    protected $table = 'katalog_pohon';
    protected $fillable =
    [
        'id', 'nama_pohon', 'nama_lain_pohon', 'deskripsi', 'foto',
    ];
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($katalogPohon) {
    //         $katalogPohon->handleDelete();
    //     });
    // }
    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "images/Katalog-Pohon";
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
}
