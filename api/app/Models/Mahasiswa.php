<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jenjang',
        'fakultas',
        'jurusan',
        'prodi',
        'seleksi',
        'status',
        'id_user',
        'agama',
        'alamat',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
