<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/Home', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/email', function () {
   return new \App\Mail\NewUserWelcomeMail();
});

Route::post('follow/{user}', 'FollowsController@store');

Route::get('dashboard/profile', 'ProfilesController@show');

Route::get('/home', 'HomeController@index');

Route::get('/categories', 'CategoryController@index');

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');

Route::prefix('/recipes')->group(function () {
    Route::get('/create-step1', 'RecipesController@createStep1');
    Route::get('/create-step2', 'RecipesController@createStep2');
    Route::get('/create-step3', 'RecipesController@createStep3');
    Route::get('/create-step4', 'RecipesController@createStep4');
    Route::post('/create-step1', 'RecipesController@postCreateStep1');
    Route::post('/create-step2', 'RecipesController@postCreateStep2');
    Route::post('/create-step3', 'RecipesController@postCreateStep3');
    Route::post('/create-step4', 'RecipesController@postCreateStep4');
    Route::post('/remove-image', 'RecipesController@removeImage');
});

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


