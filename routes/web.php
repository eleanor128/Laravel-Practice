<?php

use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('homepage', [ArticleController::class, 'homepage'])->name('showHomePage'); //這個route的名字叫showHomePage
Route::get('create', [ArticleController::class, 'create'])->name('create'); //這個route的名字叫create
Route::post('store', [ArticleController::class, 'store'])->name('store'); //這個route的名字叫store
Route::get('show/{id}', [ArticleController::class, 'show'])->name('show');
Route::get('edit', [ArticleController::class, 'edit'])->name('edit');
Route::delete('destroy', [ArticleController::class, 'destroy'])->name('destroy');

Route::get('about_me', [AboutMeController::class, 'showpage'])->name('showAboutPage'); //這個route的名字叫showAboutPage




require __DIR__ . '/auth.php';

// Route::get('/{id}', [CourseController::class, 'show'])->name('show');