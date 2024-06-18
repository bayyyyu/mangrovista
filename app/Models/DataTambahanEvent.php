<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTambahanEvent extends Model
{
    protected $table = 'data_tambahan_event';

    // Relasi dengan model Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
