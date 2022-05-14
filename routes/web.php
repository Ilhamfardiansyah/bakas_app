<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SuplaierController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\RakController;
use App\Models\Rak;
use App\Models\Suplaier;
use App\Models\Detail;
use App\Models\Size;
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
// Route::get('/dashboard/posts/{$id}', [DashboardPostController::class,'destroy'])->middleware('auth');
Route::get('/detail_rak/{rak:name}', function(Rak $rak){
    return view('dashboard.detail_rak', [
        'posts' => $rak->posts,
        'rak' => $rak->nama_barang
    ]);
})->middleware('auth');
Route::resource('/dashboard/suplaier/', SuplaierController::class)->middleware('auth');
Route::get('/dashboard/delete/{id}/',[ SuplaierController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/edit/{id}/',[ SuplaierController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/update/{data}',[ SuplaierController::class, 'update'])->middleware('auth');
Route::get('/scan/{barcode}', [DashboardPostController::class, 'scan']);
Route::get('/dashboard/edit', [EditController::class, 'edit']);
Route::get('/dashboard/cari/{barcode}', [EditController::class, 'cari']);
Route::post('/dashboard/cari/update', [EditController::class, 'update']);
Route::get('/dashboard/detail/index', [DetailController::class, 'index']);
Route::post('/dashboard/detail', [DetailController::class, 'store'])->name('detail');
Route::post('/dashboard/size', [SizeController::class, 'store'])->name('size');
Route::get('/dashboard/rak', [RakController::class, 'create']);
Route::post('/dashboard/rak', [RakController::class, 'store']);
Route::get('/dashboard/retur/index', [ReturController::class, 'index']);
Route::get('/dashboard/search/{barcode}', [ReturController::class, 'search']);
Route::get('/dashboard/destroy/{barcode}', [ReturController::class, 'destroy']);