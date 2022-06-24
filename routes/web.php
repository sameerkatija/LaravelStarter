<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\HTTP\Controllers\UserController;
use App\HTTP\Controllers\CampgroundController;

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
    return view('landing');
})->name('landing');

Route::get('/login' , [UserController::class, 'viewLogin'])->name('login');

Route::post('/login' , [UserController::class, 'loginUser'])->name('userlogin');

Route::get('/register' , [UserController::class, 'viewRegister'])->name('register');

Route::post('/register' , [UserController::class, 'addUser'])->name('userregister');

Route::get('/signout' , [UserController::class, 'signout'])->name('signout');


Route::get('/campground' ,[CampgroundController::class, 'viewCampground'])->name('campground');

Route::get('/campground/new' , [CampgroundController::class, 'newCampground'])->name('newCampground');

Route::post('/campground' ,[CampgroundController::class, 'AddCampground'])->name('savecampground');

Route::get('/campground/{id}', [CampgroundController::class, 'CampgroundByID'])->name('campgroundbyid');
Route::get('/deletecampground/{id}', [CampgroundController::class, 'DeleteCamp'])->name('deletecamp');
Route::get('/editcampground/{id}', [CampgroundController::class, 'EditCampPage'])->name('editcamppage');
Route::post('/editcampground/{id}', [CampgroundController::class, 'updateCampPage'])->name('editcampground');