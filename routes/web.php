<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/album/view/{albumId}', [AlbumController::class , 'detail'])->middleware('auth');

Route::get('/add', function () {
    return view('add');
})->middleware('auth');

Route::get('/', [AlbumController::class , 'index']);

Route::post('/add', [AlbumController::class, 'create'])->middleware('auth');

Route::get('/album/add/image/{albumId}', [MediaController::class , 'detail'])->middleware('auth');
Route::post('/album/add/image/{albumId}', [MediaController::class, 'create'])->middleware('auth');

Route::get('/user/edit/', [UserController::class , 'edit'])->middleware('auth', 'userauth');
Route::put('/user/edit/', [UserController::class , 'update'])->middleware('auth');

Route::get('/album/edit/{albumId}', [AlbumController::class , 'edit'])->middleware('auth');
Route::put('/album/edit/{albumId}', [AlbumController::class , 'update'])->middleware('auth');

Route::get('/image/edit/{mediaId}', [MediaController::class , 'edit'])->middleware(['auth', 'userauth']);
Route::put('/image/edit/{mediaId}', [MediaController::class , 'update'])->middleware(['auth', 'userauth']);

Route::delete('/image/delete/{mediaId}', [MediaController::class , 'delete'])->middleware('auth');
Route::delete('/album/delete/{albumId}', [AlbumController::class , 'delete'])->middleware('auth');

