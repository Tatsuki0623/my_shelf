<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/mypage',function (){
    return view('home.mypage');
})->middleware(['auth','verified'])->name('mypage');

Route::get('/myshelf',function (){
    return view('home.myshelf');
})->middleware(['auth','verified'])->name('myshelf');

Route::get('/othershelf',function (){
    return view('home.othershelf');
})->middleware(['auth','verified'])->name('othershelf');

Route::get('/newbooks',function (){
    return view('home.newbooks');
})->middleware(['auth','verified'])->name('newbooks');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
