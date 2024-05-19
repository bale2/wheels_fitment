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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::get('/', [ManufacturerController::class, 'dashboard'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/users', [ProfileController::class, 'users_show'])->name('users');
Route::get('/users/{id}', [ProfileController::class, 'user_with_id'])->name('user_with_id');
Route::post('/wheel_user', [ProfileController::class, 'user_wheel_post'])->name('user_wheel_post');
Route::post('/wheel_user_delet', [ProfileController::class, 'user_wheel_post_delete'])->name('user_wheel_post_delete');
Route::post('/car_user', [ProfileController::class, 'user_car_post'])->name('user_car_post');
Route::post('/car_user_delete', [ProfileController::class, 'user_car_post_delete'])->name('user_car_post_delete');


//AdController (show,createform,createpost,{id}page)
Route::get('/ads', [AdController::class, 'ads_show'])->name('ads');
Route::get('/ads/{id}', [AdController::class, 'ad_with_id_show'])->name('ads_with_id');
Route::get('/ad_create', [AdController::class, 'ad_create'])->middleware(['auth', 'verified'])->name('ad_create');
Route::post('/ad_create', [AdController::class, 'ad_create_post'])->middleware(['auth', 'verified',])->name('ad_create_post');
Route::post('/ad_delete', [AdController::class, 'ad_delete_post'])->middleware(['auth', 'verified',])->name('ad_delete_post');
Route::post('/ad_update', [AdController::class, 'ad_update_post'])->middleware(['auth', 'verified',])->name('ad_update_post');

//   Route::get('/ads', function () {
//     return view('ads', [
//       'ads' => App\Models\Ad::get(),
//       'users' =>App\Models\User::get()->first()

//     ]);
//   })->name('ads');

Route::get('/data', function () {
    return view('/wheels/wheelprops');
})->name('data');

Route::get('datas', [ManufacturerController::class, 'datas'])->name('datas');

Route::get('wheel_types', [ManufacturerController::class, 'wheel_types'])->name('wheel_types');
Route::get('wheel_types/{id}', [ManufacturerController::class, 'wheel_types_with_id'])->name('wheel_types');
Route::post('wheel_type_create', [ManufacturerController::class, 'wheel_type_create_post'])->middleware(['auth', 'verified'])->name('wheel_type_create_post');

Route::get('bolt_patterns/{type}', [ManufacturerController::class, 'bolt_patterns'])->name('bolt_patterns');
Route::get('bolt_patterns/{type}/{id}', [ManufacturerController::class, 'bolt_patterns_with_id'])->name('bolt_patterns');
Route::post('bolt_pattern_create', [ManufacturerController::class, 'bolt_pattern_create_post'])->middleware(['auth', 'verified'])->name('bolt_pattern_create_post');

Route::get('nut_bolts', [ManufacturerController::class, 'nut_bolts'])->name('nut_bolts');
Route::get('nut_bolts/{id}', [ManufacturerController::class, 'nut_bolts_with_id'])->name('nut_bolts');
Route::post('nut_bolt_create', [ManufacturerController::class, 'nut_bolts_create_post'])->middleware(['auth', 'verified'])->name('nut_bolts_create_post');

Route::get('/manufacturers/{type}', [ManufacturerController::class, 'show_manufacturers'])->name('manufacturers');
Route::get('/manufacturers/{type}/{id}', [ManufacturerController::class, 'manufacturer_with_id'])->name('manufacturer_with_id');
Route::get('/manufacturer_create', [ManufacturerController::class, 'manufacturer_create'])->middleware(['auth', 'verified'])->name('manufacturer_create');
Route::post('/manufacturer_create', [ManufacturerController::class, 'manufacturer_create_post'])->middleware(['auth', 'verified'])->name('manufacturer_create_post');

//WheelController(show,createform,createpost,{id}page)
Route::get('/wheels', [WheelController::class, 'wheels_show'])->name('wheels');
Route::get('/wheels/{id}', [WheelController::class, 'wheel_with_id'])->name('wheel_with_id');
Route::get('/wheel_create', [WheelController::class, 'wheel_create'])->middleware(['auth', 'verified'])->name('wheel_create');
Route::post('/wheel_create', [WheelController::class, 'wheel_create_post'])->middleware(['auth', 'verified',])->name('wheel_create_post');
Route::post('/wheel_update', [WheelController::class, 'wheel_update_post'])->middleware(['auth', 'verified',])->name('wheel_update_post');
Route::post('/wheel_delete', [WheelController::class, 'wheel_delete_post'])->middleware(['auth', 'verified',])->name('wheel_delete_post');

Route::get('/compare', [WheelController::class, 'compare'])->name('compare');


//cars
Route::get('/cars', [ManufacturerController::class, 'show_cars'])->name('cars');
Route::get('/cars/{id}', [ManufacturerController::class, 'car_with_id'])->name('car_with_id');
Route::post('/wheel_car', [ManufacturerController::class, 'car_wheel_post'])->name('car_wheel_post');
// Route::get('/car_create', [ManufacturerController::class, 'car_create'])->middleware(['auth', 'verified'])->name('car_create');
Route::post('/car_create', [ManufacturerController::class, 'car_create_post'])->middleware(['auth', 'verified'])->name('car_create_post');
Route::post('/car_update', [ManufacturerController::class, 'car_update_post'])->middleware(['auth', 'verified',])->name('car_update_post');
Route::post('/car_delete', [ManufacturerController::class, 'car_delete_post'])->middleware(['auth', 'verified',])->name('car_delete_post');

//calculator
Route::get('/calculator', [ManufacturerController::class, 'calculator'])->name('calculator');
