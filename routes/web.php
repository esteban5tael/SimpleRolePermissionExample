<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [_SiteController::class, 'index'])->name('index');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/a', [_SiteController::class, 'a'])->name('a');
});

Route::group(['middleware' => ['role:seller']], function () {

    Route::get('/s', [_SiteController::class, 's'])->name('s');
});

Route::group(['middleware' => ['role:client']], function () {

    Route::get('/c', [_SiteController::class, 'c'])->name('c');
});











/* --------------------------- */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
