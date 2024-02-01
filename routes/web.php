<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;


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

require __DIR__.'/auth.php';

Route::get('/users', function () {
    return view('users', [
      'users' => App\Models\User::get()
    ]);
  })->name('users');



  Route::get('/ads', [AdController::class, 'show_ads'])->name('ads');

  Route::get('/ad_create', [AdController::class, 'ad_create'])->middleware(['auth', 'verified','is_admin'])->name('ad_create');
  Route::post('/ad_create', [AdController::class, 'ad_create_post'])->middleware(['auth', 'verified','is_admin'])->name('ad_create_post');

  Route::get('/ads/{id}', [AdController::class, 'show_ad_with_id'])->name('ads_with_id');

//   Route::get('/ads', function () {
//     return view('ads', [
//       'ads' => App\Models\Ad::get(),
//       'users' =>App\Models\User::get()->first()

//     ]);
//   })->name('ads');




