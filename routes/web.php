<?php

use App\Http\Controllers\AddToListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\AuthenticateUser;






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
//-----------------------------HomeController Start------------------------------------------------------------------
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/movie_details/{movie_id}', [HomeController::class, 'movieDetails']);
Route::get('/tv_details/{tv_id}', [HomeController::class, 'tvDetails']);
Route::get('/cast_details/{person_id}', [HomeController::class, 'castDetails']);
Route::get('search/', [HomeController::class, 'search']);

//---------------------------------HomeController End----------------------------------------------------------------

//------------------------------RegistrationController Start----------------------------------------------------------
Route::get('registeration_page/', [RegistrationController::class, 'loadRegistrationPage']);
Route::post('register', [RegistrationController::class, 'register']);
//------------------------------RegistrationController End------------------------------------------------------------


//---------------------------------AuthController Start----------------------------------------------------------------
Route::get('login_page', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);

//Route::get('/logout', [DemoController::class, 'demo'])->name('demo');
//----------------------------------AuthController End----------------------------------------------------------------


//------------------------------------AddToListController Start-------------------------------------------------------------
Route::get('add_to_list', [AddToListController::class, 'checkUser']);
Route::get('new_list_page', [AddToListController::class, 'list_creation_page']);
Route::post('create_new_list', [AddToListController::class, 'addNewList']);
Route::post('add_to_list', [AddToListController::class, 'addToList']);
//-----------------------------------AddToListController End----------------------------------------------------------


//------------------------------------CustomListController Start--------------------------------------------------------
Route::get('custom_page/', [CustomListController::class, 'customPage']);
//------------------------------------CustomListController End----------------------------------------------------------