<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/', [AuthController::class, 'verify'])->name('user.login');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Users
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user_id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/users/{user_id}/show', [UserController::class, 'show'])->name('user.show');
    Route::put('/users/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/{user_id}', [UserController::class, 'destroy'])->name('user.delete');

    //Artists
    Route::get('/artists', [ArtistController::class, 'index'])->name('artist.index');
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artist.create');
    Route::post('/artists', [ArtistController::class, 'store'])->name('artist.store');
    Route::get('/artists/{artist_id}/edit', [ArtistController::class, 'edit'])->name('artist.edit');
    Route::get('/artists/{artist_id}/show', [ArtistController::class, 'show'])->name('artist.show');
    Route::get('/artists/{artist_id}/songs', [ArtistController::class, 'song'])->name('artist.song');
    Route::put('/artists/{artist_id}', [ArtistController::class, 'update'])->name('artist.update');

    //Import Export CSV
    Route::post('/artists/file-import', [ArtistController::class, 'fileImport'])->name('artist.file-import');
    Route::get('/artists/file-export', [ArtistController::class, 'fileExport'])->name('artist.file-export');

    Route::get('/artists/{artist_id}', [ArtistController::class, 'destroy'])->name('artist.delete');

    //Music
    Route::get('/songs/{artist_id}/create', [MusicController::class, 'create'])->name('song.create');
    Route::post('/songs', [MusicController::class, 'store'])->name('song.store');
    Route::get('/songs/{song_id}/edit', [MusicController::class, 'edit'])->name('song.edit');
    Route::put('/songs/{song_id}', [MusicController::class, 'update'])->name('song.update');
    Route::get('/songs/{song_id}', [MusicController::class, 'destroy'])->name('song.delete');
});


Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::post('/store', [AuthController::class, 'postRegistration'])->name('postRegistration');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
