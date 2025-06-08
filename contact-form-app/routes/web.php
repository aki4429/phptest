<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    // return view('welcome');
    return 'こんにちは、おだちんWEBです！';
});
*/
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReservationController;

Route::get('/greeting', [PagesController::class, 'greeting'])->name('greeting');
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/works', [PagesController::class, 'works'])->name('works');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// Route::get('/reservation/create', function() {
    // return view('reservation.create');
// });
Route::get('/reservation/create', [PagesController::class, 'create'])->name('create');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

Route::post('/reservation', [ReservationController::class,'store']);