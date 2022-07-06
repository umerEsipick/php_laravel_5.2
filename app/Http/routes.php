<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('store.main');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', 'StoreController@index');
    Route::controller('store', 'StoreController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::auth();
    Route::get('/home', 'HomeController@index');    
    Route::controller('mail', 'MailController');
});

