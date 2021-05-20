<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index() {
        $mataKuliah = MataKuliah::get();

        return response()->json([
            'code' => 200,
            'data' => [
                'mata_kuliah' => $mataKuliah,
            ],
            'message' => 'Sukses mengambil semua mata kuliah!',
            'success' => true,
        ]);
    }
}
