<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    // use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';
    protected $fillable = [
        'nama_lengkap',
        'username',
        'email',
        'email_verified_at',
        'password',
        'role',
        'foto_profil',
        'no_telpon'
    ];


    function handleUploadFoto()
    {

        $this->handleDelete();
        if (request()->hasFile('foto_profil')) {
            $foto_profil = request()->file('foto_profil');
            $destination = "images/User";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $foto_profil->extension();
            $url = $foto_profil->storeAs($destination, $filename);
            $this->foto_profil = "" . $url;
            $this->save();
        }
    }

    function handleDelete()
    {
        $foto_profil = $this->foto_profil;
        if ($foto_profil) {
            $path = public_path($foto_profil);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }
    // function tanaman()
    // {
    //     return $this->hasMany(Tanaman::class, 'user_id');
    // }
    // function penanaman()
    // {
    //     return $this->hasMany(Tanaman::class, 'user_id');
    // }

    //relasi
    //1
    function role_request()
    {
        return $this->hasMany(RoleRequest::class, 'id_user');
    }
    //2
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    //3
    public function pendaftaranEvents()
    {
        return $this->hasMany(PendaftaranEvent::class, 'user_id');
    }
    // Model: Deleting
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Hapus semua RoleRequest terkait
            $user->role_request()->delete();

            // Hapus semua Event terkait
            $user->events()->delete();

            // Hapus semua PendaftaranEvent terkait
            $user->pendaftaranEvents()->delete();
        });
    }
}
