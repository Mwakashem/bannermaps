<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;


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

Route::get('/', [BannerController::class, 'index'])->name('banner.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/add-banner', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/add-banners', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/banner-details/{banner}', [BannerController::class, 'show'])->name('banners.show');

});
