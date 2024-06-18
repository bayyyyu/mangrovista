<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $fillable = ['user_id', 'judul', 'isi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function roleRequest()
    {
        return $this->hasOne(RoleRequest::class);
    }
}
