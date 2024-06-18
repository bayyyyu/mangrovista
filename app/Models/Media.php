<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['dokumentasi_id', 'file_path', 'deskripsi'];

    public function dokumentasi()
    {
        return $this->belongsTo(Dokumentasi::class);
    }
}
