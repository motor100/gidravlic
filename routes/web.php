<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LkController;

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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/cart', [MainController::class, 'cart']);

Route::get('/poisk', [MainController::class, 'poisk']);

Route::get('/favourites', [MainController::class, 'favourites']);

Route::get('/comparison', [MainController::class, 'comparison']);

Route::get('/company', [MainController::class, 'company']);

Route::get('/services', [MainController::class, 'services']);

Route::get('/payment', [MainController::class, 'payment']);

Route::get('/delivery', [MainController::class, 'delivery']);

Route::get('/warranty', [MainController::class, 'warranty']);

Route::get('/calculators', [MainController::class, 'calculators']);

Route::get('/contacts', [MainController::class, 'contacts']);


Route::get('/politika-konfidencialnosti', [MainController::class, 'politika_konfidencialnosti']);

Route::get('/polzovatelskoe-soglashenie-s-publichnoj-ofertoj', [MainController::class, 'polzovatelskoe_soglashenie_s_publichnoj_ofertoj']);

Route::get('/garantiya-vozvrata-denezhnyh-sredstv', [MainController::class, 'garantiya_vozvrata_denezhnyh_sredstv']);

Route::get('/ajax/we-use-cookie', [MainController::class, 'we_use_cookie']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Личный кабинет
Route::middleware('auth')->group(function () {
    Route::get('/lk/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/lk/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/lk/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lk', [LkController::class, 'home'])->name('lk.index');
});

require __DIR__.'/auth.php';
