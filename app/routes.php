<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
        //return 'yes';
	return View::make('hello');
});

Route::get('login', 'SessionsController@create'); //alias login for sessions
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');


Route::group(array('before' => 'auth'), function() 
{

    Route::get('dashboard',function()
       {
	return View::make('dashboard');
       })->before('auth');

    
      Route::resource('students','StudentController');
      Route::resource('users', 'UserController');
      Route::resource('subjects','SubjectController');
      //Route::resource('grados', 'GradoController');
    
      Route::delete('grados/{id_grados}/{id_subjects}/destroy', array('as' => 'grados.destroy', 'uses' => 'GradoController@destroy'));
      Route::resource('grados', 'GradoController', array('except' => array('destroy'))); 
      
      Route::resource('groups','GroupController');
      Route::resource('scores','ScoreController');
 });

Route::get('first/page', function()
{  
	return 'firstPage';
});
