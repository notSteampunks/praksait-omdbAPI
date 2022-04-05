<?php

use App\Http\Controllers\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/siswa',[PostController::class, 'index']);
Route::get('/siswa/{siswa}',[PostController::class, 'show']);
Route::post('/siswa',[PostController::class, 'store']);
Route::put('siswa/{siswa}', [PostController::class, 'update']);
Route::delete('siswa/{siswa}', [PostController::class, 'destroy']);

Route::get('siswa', [PostController::class, 'show_data_to_browser']);

