<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LessonController;

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

Route::get('/book',  [LessonController::class, 'showBookForm'] )->name('user.book');
Route::post('/book',  [LessonController::class, 'saveUserBooking'] )->name('user.book.save');
