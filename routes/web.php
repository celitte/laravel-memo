<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'store'])->name('store');
//編集画面に遷移させる
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
// 更新処理
Route::post('/update', [HomeController::class, 'update'])->name('update');
//削除処理
Route::post('/destroy', [HomeController::class, 'destroy'])->name('destroy');
