<?php

use App\Http\Controllers\AddToListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemoController;
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

// Route::get('/', function () {
//     return view('Trending');
// });

// Route::group(['middleware'=>['web','auth_user']],function(){
//     Route::get('trending',[DemoController::class,'demo']);  
// });
// Route::get('/trending', function () {
//     return view('Trending');
// })->middleware(AuthenticateUser::class);
//Route::group(['middleware' => ['web', 'auth_user']], function () {
    Route::get('/', [DemoController::class, 'demo'])->name('demo');
// });
Route::get('/fetch_cast/{movie_id}', [DemoController::class, 'fetchCast']);
Route::get('/fetch_person/{person_id}', [DemoController::class, 'fetchPerson']);
Route::get('search/', [DemoController::class, 'search']);

//------------------------------RegistrationController Start-----------------------------------------------
Route::get('registeration_page/', [RegistrationController::class, 'loadRegistrationPage']);
Route::post('register', [RegistrationController::class, 'register']);
//------------------------------RegistrationController End-------------------------------------------------------


//---------------------------------AuthController Start---------------------------------------------------------
Route::get('login_page', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
//Route::get('/logout1', [DemoController::class, 'demo'])->name('demo');
//----------------------------------AuthController End----------------------------------------------------------------


//------------------------------------AddToListController-------------------------------------------------------------
Route::get('add_to_list', [AddToListController::class, 'checkUser']);
Route::get('new_list_page', [AddToListController::class, 'list_creation_page']);
Route::post('create_new_list', [AddToListController::class, 'addNewList']);
