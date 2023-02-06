<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DrinkController;
use App\Http\Controllers\BraintreeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])
    ->prefix('admin') // prefisso URL
    ->name('admin.') // nome rotta 
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::resource('drinks', DrinkController::class);
    });


Route::any('/payment', [BraintreeController::class, 'token'])->name('token')->middleware('auth');

require __DIR__ . '/auth.php';
