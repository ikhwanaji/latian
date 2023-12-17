<?php
use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('Pegawai', [MahasiswaController::class, 'index']);
//Route::get('Pegawai/{id}', [MahasiswaController::class, 'show']);
//Route::post('Pegawai', [MahasiswaController::class, 'store']);
//Route::put('Pegawai/{id}', [MahasiswaController::class, 'update']);
//Route::delete('Pegawai/{id}', [MahasiswaController::class, 'destroy']);

Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::get('/{id}', [MahasiswaController::class, 'show']);
    Route::post('/', [MahasiswaController::class, 'store']);
    Route::put('/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/{id}', [MahasiswaController::class, 'destroy']);
});