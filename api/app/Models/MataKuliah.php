<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen_id',
        'kode_matkul',
        'nama',
        'semester',
    ];

    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }
}
