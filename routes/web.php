<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\WheelController;



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


//AdController(show,createform,createpost,{id}page)
  Route::get('/ads', [AdController::class, 'ads_show'])->name('ads');
  Route::get('/ad_create', [AdController::class, 'ad_create'])->middleware(['auth', 'verified'])->name('ad_create');
  Route::post('/ad_create', [AdController::class, 'ad_create_post'])->middleware(['auth', 'verified',])->name('ad_create_post');
  Route::get('/ads/{id}', [AdController::class, 'ad_with_id_show'])->name('ads_with_id');

//   Route::get('/ads', function () {
//     return view('ads', [
//       'ads' => App\Models\Ad::get(),
//       'users' =>App\Models\User::get()->first()

//     ]);
//   })->name('ads');

Route::get('/manufacturers', [ManufacturerController::class, 'show_manufacturers'])->middleware(['auth', 'verified'])->name('manufacturers');
Route::get('/manufacturer_create', [ManufacturerController::class, 'manufacturer_create'])->middleware(['auth', 'verified'])->name('manufacturer_create');
Route::post('/manufacturer_create', [ManufacturerController::class, 'manufacturer_create_post'])->middleware(['auth', 'verified'])->name('manufacturer_create_post');
Route::get('/manufacturers/{id}', [ManufacturerController::class, 'manufacturer_with_id'])->middleware(['auth', 'verified'])->name('manufacturer_with_id');

//WheelController(show,createform,createpost,{id}page)
Route::get('/wheels', [WheelController::class, 'wheels_show'])->middleware(['auth', 'verified'])->name('wheels');
Route::get('/wheel_create', [WheelController::class, 'wheel_create'])->middleware(['auth', 'verified'])->name('wheel_create');
Route::post('/wheel_create', [WheelController::class, 'wheel_create_post'])->middleware(['auth', 'verified',])->name('wheel_create_post');

Route::get('wheel_types', [WheelController::class, 'wheel_types'])->middleware(['auth', 'verified'])->name('wheel_types');
Route::post('wheel_type_create', [WheelController::class, 'wheel_type_create_post'])->middleware(['auth', 'verified'])->name('wheel_type_create_post');

Route::get('bolt_patterns', [WheelController::class, 'bolt_patterns'])->middleware(['auth', 'verified'])->name('bolt_patterns');
Route::post('bolt_pattern_create', [WheelController::class, 'bolt_pattern_create_post'])->middleware(['auth', 'verified'])->name('bolt_pattern_create_post');

Route::get('nut_bolts', [WheelController::class, 'nut_bolts'])->middleware(['auth', 'verified'])->name('nut_bolts');
Route::post('nut_bolt_create', [WheelController::class, 'nut_bolts_create_post'])->middleware(['auth', 'verified'])->name('nut_bolts_create_post');


Route::get('/wheels/{id}', [WheelController::class, 'wheel_with_id'])->middleware(['auth', 'verified'])->name('wheel_with_id');

//WheelController(datas)

Route::get('/datas', function () {
     return view('/wheels/wheelprops');
     })->middleware(['auth', 'verified'])->name('datas');

