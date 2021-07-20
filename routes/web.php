<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/s/migrate', function () {
    \Artisan::call('migrate');
    dd("Cache is cleared");
});
Route::get('/s/clear_cache', function () {
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    dd("Cache is cleared");
});
Route::get('/user/info', function () {
    return view('users/temp_1');
});
Route::get('/{user_name}', [HomeController::class, 'userInfo'])->name('user.info');

Route::get('/users/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/users/theme', [HomeController::class, 'userTheme'])->middleware(['auth'])->name('user.theme');
Route::post('/users/updateInfo', [HomeController::class, 'updateInfo'])->middleware(['auth'])->name('user.update_info');

require __DIR__.'/auth.php';
