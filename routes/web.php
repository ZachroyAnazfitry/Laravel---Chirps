<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// The auth middleware ensures that only logged-in users can access the route.

// using resource() method
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store'])
    ->only(['index', 'store','update','edit','destroy'])

    // auth middleware allow only logged in users to access above routes
    // verified middleware used only for email verification
    ->middleware(['auth', 'verified']);

Route::get('/wizard', function () {
    return view('livewire.wizard');
})->middleware(['auth', 'verified'])->name('wizard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
