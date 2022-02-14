<?php

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

Route::get('/', "BlogController@index")->name('index');
Route::get('/detail/{id}', "BlogController@detail")->name('detail');
Route::get('/category/{id}', "BlogController@baseOnCategory")->name('category');
Route::get('/user/{id}', "BlogController@baseOnUser")->name('user');
Route::get('/date/{date}', "BlogController@baseOnDate")->name('date');
Route::view('/about', 'blog.about')->name('about');

Auth::routes();

Route::get('auth/google', 'GoogleController@redirect')->name("gg.redirect");
Route::get('auth/google/callback', 'GoogleController@callback')->name("gg.callback");

Route::prefix("dashboard")->middleware('auth')->group( function(){

    Route::resource("category", "CategoryController") ;
    Route::resource("article", "articleController") ;


    Route::prefix("profile")->middleware('auth')->group(function (){
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get("/", "ProfileController@profile")->name("profile") ;

    Route::get("/edit-password", "ProfileController@editPassword")->name("profile.edit.password") ;
    Route::post("/change-password", "ProfileController@changePassword")->name("profile.change.password") ;

    Route::get('/edit-email', "ProfileController@editNameEmail")->name("profile.edit.name.email");
    Route::post("/change-name", "ProfileController@changeName")->name("profile.changeName");
    Route::post("/change-email", "ProfileController@changeEmail")->name("profile.changeEmail");

    Route::get("/edit-photo", "ProfileController@editPhoto")->name("profile.edit.photo") ;
    Route::post('/chnage-photo', "ProfileController@changePhoto")->name('profile.changePhoto');

});
    
});
