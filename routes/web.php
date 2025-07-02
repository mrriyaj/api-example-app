<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Hotel routes
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/api/hotels/rooms', [HotelController::class, 'getRoomList'])->name('hotels.api.rooms');
Route::get('/api/hotels/currency-rates', [HotelController::class, 'getCurrencyRates'])->name('hotels.api.currency');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
