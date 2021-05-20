<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DosenController;
use App\Http\Controllers\api\MahasiswaController;
use App\Http\Controllers\api\MataKuliahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'code' => 200,
        'data' => [
            'app' => config('app.name'),
        ],
        'message' => 'Selamat datang di API app ' . config('app.name'),
        'success' => true,
    ]);
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['jwt'])->group(function () {
    Route::get('/profil', [MahasiswaController::class, 'profile']);

    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'get']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);

    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/{id}', [DosenController::class, 'get']);

    Route::get('/mata-kuliah', [MataKuliahController::class, 'index']);
});
