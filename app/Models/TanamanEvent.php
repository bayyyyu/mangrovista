<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanEvent extends Model
{
    protected $table = 'tanaman_event';
    protected $fillable = ['id','event_id','jenis_pohon','umur_bibit','jumlah_pohon'];
    use HasFactory;
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
