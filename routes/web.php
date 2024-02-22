<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// お問い合わせフォーム

//入力ページ
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
//確認ページ
Route::post('/contact/confirm', [ContactController::class,'confirm'])->name('contact.confirm');
//送信完了ページ
Route::post('/contact/thanks', [ContactController::class,'send'])->name('contact.send');

//お問い合わせ一覧
Route::get('/contact/list',[ContactController::class,'list'])->name('contact.list');
//お問い合わせ詳細
Route::get('/contact/detail/{id}',[ContactController::class,'detail'])->whereNumber('id')->name('contact.detail');
