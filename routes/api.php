<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/mahasiswa/find', [HomeController::class, 'index']);       // get all mahasiswa
Route::get('/mahasiswa/find/{id}', [HomeController::class, 'show']);   // get mahasiswa by id

Route::post('/mahasiswa/store', [HomeController::class, 'store']);      // tambah data mahasiswa
Route::delete('/mahasiswa/destroy/{id}', [HomeController::class, 'destroy']); // hapus data mahasiswa

Route::put('/mahasiswa/update/put/{id}',[HomeController::class , 'update']);
Route::patch('/mahasiswa/update/patch/{id}',[HomeController::class, 'update']);