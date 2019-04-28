<?php

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

Route::get('/','TasksController@index');
Route::resource('tasks','TasksController');

Route::get('/sample',function(){
    return view('tasks.sample');
});

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

Route::group(['middleware'=>['auth']],function(){
    Route::resource('users','UsersController',['only'=>['index','show']]);
});

Route::get('childtasks/{id}/create','TasksController@createChildTask')->name('create.childtask');
Route::post('childtasks/{id}/store','TasksController@storeChildTask')->name('store.childtask');
Route::put('childtasks/{id}/update','TasksController@updateChildTask')->name('update.childtask');
Route::get('childtasks/{id}/edit','TasksController@editChildTask')->name('edit.childtask');
Route::get('childtasks/{id}/show','TasksController@showChildTask')->name('show.childtask');
Route::delete('childtasks/{id}/destroy','TasksController@destroyChildTask')->name('destroy.childtask');


Route::post('tasks/{id}/added','TasksController@added')->name('added.tasks');
Route::post('tasks/{id}/unadded','TasksController@un_added')->name('un_added.tasks');