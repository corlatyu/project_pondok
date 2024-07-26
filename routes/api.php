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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\GuruController;

Route::get('/gurus', [GuruController::class, 'apiIndex']);
Route::post('/gurus', [GuruController::class, 'apiStore']);
Route::get('/gurus/{guru}', [GuruController::class, 'apiShow']);
Route::put('/gurus/{guru}', [GuruController::class, 'apiUpdate']);
Route::delete('/gurus/{guru}', [GuruController::class, 'apiDestroy']);

