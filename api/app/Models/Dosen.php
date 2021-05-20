<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'alamat',
    ];

    public function mataKuliah() {
        return $this->hasMany(MataKuliah::class, 'dosen_id', 'id');
    }
}
