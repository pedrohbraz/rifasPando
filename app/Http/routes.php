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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/teste','UserController@index');

Route::get('vazio', function () {
    echo "rota vazia";
});

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

/*Route::group(['middleware' => ['web']], function () {
    //
});*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

	Route::get('/', 'AcaoController@index');


   Route::get("/acao",'AcaoController@index');

   Route::get("/acao/{usuario}/exibir",'AcaoController@acaosUser');
    Route::get('/home', 'HomeController@index');


    Route::get('acao/inserir', 'AcaoController@create');

    Route::post('acao/inserir', 'AcaoController@store');

    Route::get('/perfil',function(){
      return view ('Users/TelaUser');
    });

    Route::get('image/{folder}/{filename}/{size}', function ($folder,$filename,$size)
	{
	    $img = Image::make(storage_path().'/app/'.$folder.'/'.$filename.'.jpg')->fit($size);

	    return $img->response('jpg');
	});

	Route::get('acao/{id}', 'AcaoController@show');

});
