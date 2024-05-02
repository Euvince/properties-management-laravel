<?php

use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Illuminate\Support\Facades\Route;

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

$idsRegex = '[0-9]*';
$slugRegex = '[a-z0-9\-]*';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/biens', [App\Http\Controllers\PropertyController::class, 'index'])->name('index');
Route::get('/biens/{slug}-{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('show')->where([
    'property' => $idsRegex,
    'slug' => $slugRegex
]);
Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('contact')->where([
    'property' => $idsRegex
]);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('options', OptionsController::class)->except(['show']);
});
