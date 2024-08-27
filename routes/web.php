<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UndianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.landing.landing');
// })->name("layouts.index");

Route::middleware(['throttle:5,1'])->get('/', function () {
    return view('pages.landing.landing');
})->name("layouts.index");

Route::get('/tickets', [TicketController::class, 'index'])->middleware('throttle:5,1')->name('tickets.index');
Route::get('/tickets/show', [TicketController::class, 'show'])->middleware('throttle:4,1')->name('tickets.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/export-excel', [ParticipantController::class, 'exportExcel'])->name('export.participant');
    Route::get('admin/undian/winners', [UndianController::class, 'show'])->name('undian.show');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('/participant', ParticipantController::class)->except("store");
    Route::resource('/undian', UndianController::class)->except("show");
});
Route::post('/participant/store', [ParticipantController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('participant.store');




require __DIR__ . '/auth.php';
