<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\BlogsController;

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
Route::get('/login-page', [AdminController::class, 'loginPage']);
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
// Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::resource('cates', CategoriesController::class);
Route::resource('blogs', BlogsController::class);