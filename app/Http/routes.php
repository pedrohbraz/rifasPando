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

    Route::get('/perfil',function(){
        if(Auth::check()){
            return view ('Users/TelaUserTeste');
        }
        else
            return view('auth.register');
    });
	
	Route::get('/', 'AcaoController@index');
    Route::get('/home', 'HomeController@index');
    Route::get("/acao",'AcaoController@index');
    
    //Rotas das acoes em relação ao usuario
    
    Route::get('acao/inserir', 'AcaoController@create');
    Route::post('acao/inserir', 'AcaoController@store');
    Route::get("/acao/{usuario}/organizadas/andamento/exibir",'AcaoController@acaosOrgAndamento');
    Route::get("/acao/{usuario}/organizadas/fechadas/exibir",'AcaoController@acaosOrgClosed');
    Route::get("/acao/{usuario}/compradas/andamento/exibir",'AcaoController@acaosCompAndamento');
    Route::get("/acao/{usuario}/compradas/fechadas/exibir",'AcaoController@acaosCompClosed');
    //Atualização de perfil--usando controlador de usuario

    Route::get('/perfil/{id}/editar','UserController@edit');
    Route::post('/perfil/{id}/atualizar','UserController@update');


    Route::get('image/{folder}/{filename}/{size}', function ($folder,$filename,$size)
	{
	    $img = Image::make(storage_path().'/app/'.$folder.'/'.$filename.'.jpg')->fit($size);

	    return $img->response('jpg');
	});

    Route::get("/acao",'AcaoController@index');
    Route::get('acao/inserir', 'AcaoController@create');
    Route::post('acao/inserir', 'AcaoController@store');
  	Route::get('acao/{id}', 'AcaoController@show');
	Route::post('acao/{id}', 'MensagemController@store');

	Route::group(['middleware' => 'role:admin'],function(){
		Route::get('admin','MensagemADMController@index');
		Route::get('mensagem_adm','MensagemADMController@index');
		Route::get('mensagem_adm/inserir','MensagemADMController@create');
		Route::post('mensagem_adm/inserir','MensagemADMController@store');

	});

//	Route::get('carrinho','AcaoController@carrinhoDeCompras');
	Route::post('carrinho/{id}',['as'=>'carrinho', 'uses'=>'AcaoController@checkout']);

	Route::post('paypal', 'AcaoController@paypal');
	

	Route::get('confirmacao', 'ConfirmacaoController@index');

});
