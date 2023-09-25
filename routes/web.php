<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KindController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ReadTimeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(BookController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/newbooks','preview')->name('newbooks');
    Route::post('/myshelf/books','store')->name('book_store');
    Route::get('/myshelf/books/register','register')->name('book_register');
    Route::get('/myshelf/books/users/{user}/{book}','show')->name('book_show');
    Route::put('/myshelf/books/{book}','update')->name('book_update');
    Route::delete('/myshelf/books/{book}','delete')->name('book_delete');
    Route::get('/myshelf/books/{book}/edit','edit')->name('book_edit');
    Route::get('/myshelf/books/{book}/link/search','search')->name('book_link_search');
    Route::put('/myshelf/books/{book}/link','add')->name('book_link_result');
});

Route::controller(KindController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/myshelf/users/{user}/1','show')->name('myshelf_commic');
    Route::get('/myshelf/users/{user}/2','show')->name('myshelf_novel');
    Route::get('/myshelf/users/{user}/filter','filter')->name('myshelf_filter');
    Route::get('/myshelf/users/{user}/info','info')->name('myshelf_info');
    Route::get('/othershelf/users/{user}/1','show')->name('othershelf');
    Route::get('/othershelf/users/{user}/2','show')->name('othershelf');
});

Route::controller(MemoController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/mypage/users/{user}','show')->name('mypage');
    Route::post('/mypage/memos','store')->name('memo_store');
    Route::get('/mypage/memo/add','add')->name('memo_add');
    Route::get('/mypage/memos/{memo}','detail')->name('memo_show');
    Route::put('/mypage/memos/{memo}','update')->name('memo_update');
    Route::delete('/mypage/memos/{memo}','delete')->name('memo_delete');
    Route::get('/mypage/memos/{memo}/edit','edit')->name('memo_edit');
});

Route::controller(ReadTimeController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::post('/mypage/ReadTime','store')->name('ReadTime_store');
    Route::put('/mypage/ReadTime/{read_time}','update')->name('ReadTime_update');
});

Route::controller(UserController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/othershelf','show')->name('othershelf');
    Route::post('/othershelf/favorite/{user}/attach','favorite')->name('user_favorite');
    Route::delete('/othershelf/favorite/{user}/detach','unFavorite')->name('user_favorite_delete');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';