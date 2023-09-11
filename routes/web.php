<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\SuaraController;
use App\Http\Controllers\TpsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('admin', AdminController::class);

Route::resource('tps', TpsController::class);

Route::resource('paslon',PaslonController::class);

Auth::routes();

Route::resource('suara',SuaraController::class);

Route::get('/datasuara', [SuaraController::class, 'datasuara'])->name('datasuara');

Route::get('/home', [TpsController::class, 'home'])->name('home');
Route::get('/hasilquick', [SuaraController::class, 'hasilquick'])->name('hasilquick');
Route::get('/input_suara_page/{tps_id}', [PaslonController::class, 'input_suara_page'])->name('input_suara_page');

