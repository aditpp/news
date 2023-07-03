<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\TechController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/')->name('index');


// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::get('/', [NewsController::class, 'index'])->name('home');

// Route::post('/', [NewsController::class, 'index'])->name('news.index');


Route::get('/general', [NewsController::class, 'general'])->name('general');

Route::get('/sport', [SportController::class, 'sport'])->name('sport');

Route::get('/tech', [TechController::class, 'tech'])->name('tech');

Route::get('/health', [HealthController::class, 'health'])->name('health');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

