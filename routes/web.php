<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KindController;
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

Route::get('/myshelf/add',function (){
    return view('book.add_book');
})->middleware(['auth','verified'])->name('add_book');

Route::get('/myshelf/add/search',function (){
    return view('book.search_book');
})->middleware(['auth','verified'])->name('search_book');

Route::get('/othershelf',function (){
    return view('home.othershelf');
})->middleware(['auth','verified'])->name('othershelf');

Route::controller(BookController::class)->middleware(['auth'])->group(function(){
    Route::get('/newbooks','get_rakuten_items')->name('newbooks');
    Route::post('/myshelf/books','store')->name('store');
    Route::get('/myshelf/books/register','register')->name('register');
    Route::get('/myshelf/books/{book}','show')->name('show');
});

Route::controller(KindController::class)->middleware(['auth'])->group(function(){
    Route::get('/myshelf/1','show')->name('myshelf_commic');
    Route::get('/myshelf/2','show')->name('myshelf_novel');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
