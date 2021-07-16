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
Route::get('/user/info', function () {
    return view('users/temp_1');
});
Route::get('/{user_name}', [HomeController::class, 'userInfo'])->name('user.info');

Route::get('/users/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/users/updateInfo', [HomeController::class, 'updateInfo'])->middleware(['auth'])->name('user.update_info');

require __DIR__.'/auth.php';
