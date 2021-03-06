<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {return view('index'); })->name('home');

Route::get('/book',  [LessonController::class, 'showReservationForm'] )->name('user.book');
Route::post('/book',  [LessonController::class, 'saveUserBooking'] )->name('user.book.save');

Route::get('/book/list',  [LessonController::class, 'list'] )->name('user.book.list');
Route::delete('/book/:id/delete',  [LessonController::class, 'deleteReservation'] )->name('book.delete');

Route::get('/user/list',  [UserController::class, 'list'] )->name('user.list');