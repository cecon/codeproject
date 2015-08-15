<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Response;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('client','ClientController@index');
Route::post('client','ClientController@store');
Route::get('client/{id}','ClientController@show');
Route::put('client/{id}','ClientController@update');
Route::delete('client/{id}','ClientController@destroy');

Route::get('project','ProjectController@index');
Route::post('project','ProjectController@store');
Route::get('project/{id}','ProjectController@show');
Route::put('project/{id}','ProjectController@update');
Route::delete('project/{id}','ProjectController@destroy');

Route::get('project/note','ProjectNoteController@index');
Route::post('project/note','ProjectNoteController@store');
Route::get('project/note/{id}','ProjectNoteController@show');
Route::delete('project/note/{id}','ProjectNoteController@destroy');