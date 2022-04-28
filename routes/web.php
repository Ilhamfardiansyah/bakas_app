<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SuplaierController;
use App\Models\Rak;
use App\Models\Suplaier;
use App\Http\Controllers\ReturController;


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
Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


Route::post('/coba/post', [DashboardPostController::class,'store'])->name('coba.post')->middleware('auth');

Route::get('/detail_rak/{rak:name}', function(Rak $rak){
    return view('dashboard.detail_rak', [
        'posts' => $rak->posts,
        'rak' => $rak->nama_barang
    ]);
})->middleware('auth');

Route::resource('/dashboard/suplaier', SuplaierController::class)->middleware('auth');
// Route::resource('/dashboard/posts/input', DashboardPostController::class)->middleware('auth');

// Route::get('/dashboard/retur', function(){
//     return view('dashboard.retur');
// });

Route::resource('/dashboard/retur', ReturController::class)->middleware('auth');

Route::get('/scan/{barcode}', [DashboardPostController::class, 'scan']);