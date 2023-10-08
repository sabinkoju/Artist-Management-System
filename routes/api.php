<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\MusicController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/mail/reset-password', [AuthController::class, 'sendResetPassword'])->name('sendResetPassword');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('logout', [AuthController::class, 'logout']);

        //Artists
        Route::get('/artists', [ArtistController::class, 'index']);
        Route::post('/artists', [ArtistController::class, 'store']);
        Route::get('/artists/{artist_id}/edit', [ArtistController::class, 'edit']);
        Route::get('/artists/{artist_id}/show', [ArtistController::class, 'show']);
        Route::get('/artists/{artist_id}/songs', [ArtistController::class, 'song']);
        Route::post('/artists/{artist_id}', [ArtistController::class, 'update']);
        Route::delete('/artists/{artist_id}', [ArtistController::class, 'destroy']);

        //Music
        Route::post('/songs', [MusicController::class, 'store']);
        Route::get('/songs/{song_id}/edit', [MusicController::class, 'edit']);
        Route::post('/songs/{song_id}', [MusicController::class, 'update']);
        Route::delete('/songs/{song_id}', [MusicController::class, 'destroy']);
    });
});
