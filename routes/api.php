<?php

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


Route::post('/register' , [\App\Http\Controllers\AuthController::class , 'register']);
Route::post('/login' , [\App\Http\Controllers\AuthController::class , 'login']);
Route::post('/logout' , [\App\Http\Controllers\AuthController::class , 'logout']);


Route::get('/progres', [\App\Http\Controllers\ProgresController::class , 'index']);
Route::post('/creatprogres' , [\App\Http\Controllers\ProgresController::class , 'store']);
Route::post('/updateprogres' ,[\App\Http\Controllers\ProgresController::class , 'update']);
Route::delete('/deleteprogres/{id}' , [\App\Http\Controllers\ProgresController::class , 'destroy']);
