<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



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

Route::middleware('auth')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/add_user', [AdminController::class, 'add'])->name('add');
    Route::post('/add_user', [AdminController::class, 'store'])->name('store');
    Route::get('/owner/{restroOwner:user_id}', [AdminController::class, 'single_owner'])->name('single_owner');
    Route::post('/owner/{restroOwner:user_id}/subscription', [AdminController::class, 'subscription'])->name('subscription');

});

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'loginAttempt'])->name('loginAttempt');



Route::get('/{any}', function(){
    return view('pages.404');
})->where('any', '.*');



