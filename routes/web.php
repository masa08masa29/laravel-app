<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AuthenticateAdmin;

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

Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class,'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [ContactController::class,'send'])->name('contact.send');

Route::middleware(['auth',AuthenticateAdmin::class])->group(function () {
Route::get('/contact/list',[ContactController::class,'list'])->name('contact.list');
Route::get('/contact/detail/{id}',[ContactController::class,'detail'])->whereNumber('id')->name('contact.detail');
Route::delete('/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
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
