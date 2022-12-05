<?php

use App\Http\Controllers\DemoController;
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
    return view('Trending');
});
Route::get('/demo', [DemoController::class, 'demo'])->name('demo');
Route::get('/fetch_cast/{movie_id}', [DemoController::class, 'fetch_cast']);
Route::get('/fetch_person/{person_id}', [DemoController::class, 'fetch_person']);
Route::get('search/', [DemoController::class, 'search']);
