<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplyPersonController;
use App\Http\Controllers\PostController;

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

Route::get('/post/{id}', [ApplyPersonController::class, 'post'])->name('post');
Route::post('/apply', [ApplyPersonController::class, 'applyprocess'])->name('apply');

Route::get('/apply/list', [ApplyPersonController::class, 'index'])->middleware(['auth'])->name('apply.list');
Route::get('/manage/create', [ApplyPersonController::class, 'create'])->middleware(['auth'])->name('manage.create');
Route::post('/manage/store', [ApplyPersonController::class, 'store'])->middleware(['auth'])->name('manage.store');

Route::resource('/posts', PostController::class)->middleware(['auth']);
require __DIR__.'/auth.php';
