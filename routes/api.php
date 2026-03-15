<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/mahasiswa', [HomeController::class, 'index']);       // get all mahasiswa
Route::get('/mahasiswa/{id}', [HomeController::class, 'show']);   // get mahasiswa by id

Route::post('/mahasiswa', [HomeController::class, 'store']);      // tambah data mahasiswa
Route::delete('/mahasiswa/{id}', [HomeController::class, 'destroy']); // hapus data mahasiswa

Route::put('/mahasiswa/{id}',[HomeController::class , 'update']);
Route::patch('/mahasiswa/{id}',[HomeController::class, 'update']);