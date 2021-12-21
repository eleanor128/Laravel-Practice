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

require __DIR__ . '/auth.php';

Route::prefix('article')->name('article.')->group(function () {

    Route::get('w/destroyed', [ArticleController::class, 'indexWithDestroyed'])
        ->name('w/destroyed');

    Route::get('w/destroyed/{article}', [ArticleController::class, 'show'])
        ->withTrashed()
        ->where('article', '\d+') // d:digit +:至少一個以上
        ->name('show');

    Route::put('{article}/restore', [ArticleController::class, 'restore'])
        ->withTrashed()
        ->name('restore');
});


Route::get('homepage', [ArticleController::class, 'homepage'])->name('showHomePage'); //這個route的名字叫showHomePage
Route::get('create', [ArticleController::class, 'create'])->name('create'); //這個route的名字叫create
Route::post('store', [ArticleController::class, 'store'])->name('store'); //這個route的名字叫store
Route::get('show/{article}', [ArticleController::class, 'show'])->name('show');
Route::get('readmore/{article}', [ArticleController::class, 'readmore'])->name('readmore');
Route::get('edit/{article}', [ArticleController::class, 'edit'])->name('edit'); //?
Route::put('update/{article}', [ArticleController::class, 'update'])->name('update');
Route::delete('destroy/{article}', [ArticleController::class, 'destroy'])->name('destroy');



Route::get('about_me', [AboutMeController::class, 'showpage'])->name('showAboutPage'); //這個route的名字叫showAboutPage










// Route::get('/{id}', [CourseController::class, 'show'])->name('show');