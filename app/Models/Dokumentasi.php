<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi_event';
    protected $fillable = ['event_id', 'file', 'deskripsi'];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function handleUploadFile($file)
    {
        $this->handleDelete();
        if ($file) {
            $destination = "file/Dokumentasi Event";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->file = $url;
            $this->save();
        }
    }

    public function handleDelete()
    {
        if ($this->file) {
            $path = public_path('storage/' . $this->file);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }
}
