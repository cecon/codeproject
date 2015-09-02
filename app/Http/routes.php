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
    //
});

Route::group(['middleware'=> 'oauth'], function(){
    Route::resource('client', 'ClientController', ['except'=> ['create', 'edit']]);

    //Route::group(['middleware'=>'CheckProjectOwner'], function(){
        Route::resource('project', 'ProjectController', ['except'=> ['create', 'edit']]);
    //});

    Route::group(['prefix' => 'project'], function(){

        Route::get('{id}/note','ProjectController@index');
        Route::post('{id}/note','ProjectController@store');
        Route::get('{id}/note/{noteId}','ProjectController@show');
        Route::delete('note/{id}','ProjectController@destroy');

        Route::post('{id}/file','ProjectFileController@store');
    });



});

