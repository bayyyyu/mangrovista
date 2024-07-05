<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranEvent extends Model
{
    protected $table = 'pendaftaran_event';
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
