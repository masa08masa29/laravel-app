<?php

use App\Http\Controllers\ProfileController;
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

//お問い合わせ入力ページ
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
//お問い合わせ確認ページ
Route::post('/contact/confirm', [ContactController::class,'confirm'])->name('contact.confirm');
//お問い合わせ送信完了ページ
Route::post('/contact/thanks', [ContactController::class,'send'])->name('contact.send');

//お問い合わせ一覧
Route::get('/contact/list',[ContactController::class,'list'])->name('contact.list');
//お問い合わせ詳細
Route::get('/contact/detail/{id}',[ContactController::class,'detail'])->whereNumber('id')->name('contact.detail');
//お問い合わせ削除
Route::delete('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', 'MailableController@index');
Route::post('/contact', 'MailableController@send');

require __DIR__.'/auth.php';
