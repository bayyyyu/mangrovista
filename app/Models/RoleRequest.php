<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    protected $table = 'role_request';
    protected $fillable = [
        'user_id','request_role','status_request','nama_lengkap',
        'email','no_telpon','alamat','pengalaman','alasan',
        'rencana_acara','jumlah_edit','alasan_penolakan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
