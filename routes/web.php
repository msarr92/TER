<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\trajetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/reservation',[trajetController::class,'formReserve'])->name('reserver');//redirige vers la page de reservation
Route::post('/reservation/faireReservation',[ReservationController::class,'faireReservation'])->name('faire-reserve');//faire la reservation



require __DIR__.'/auth.php';
