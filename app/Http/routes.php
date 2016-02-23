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
Route::get('/bring/the/application/down/now', 'AcaoController@Kill');
Route::get('/bring/the/application/up/now', 'AcaoController@Up');

Route::get('image/{folder}/{filename}/{size}', ['as' => 'imagemmanutencao', 'uses' => function ($folder,$filename,$size)
{
    $img = Image::make(storage_path().'/app/'.$folder.'/'.$filename.'.jpg')->fit($size);

    return $img->response('jpg');
}]);


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/perfil',function(){
        if(Auth::check()){
            return view ('Users/TelaUserTeste');
        }
        else
            return view('auth.login ');
    });

    Route::get('/',['as'=>'home', 'uses'=> 'HomeController@index']);

	  Route::get('/', 'AcaoController@index');
    Route::get('/finalizadas','AcaoController@finalizadas');
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
    Route::get('acao',['as'=>'acao', 'uses'=>'AcaoController@index'] );

    Route::group(['middleware' => 'auth', 'role:admin|user'],function(){
        Route::get('acao/inserir', 'AcaoController@create');
        Route::post('acao/inserir', 'AcaoController@store');
        Route::post('acao/{id}', 'MensagemController@store');
    });

    Route::get("/acao",'AcaoController@index');
    Route::get('acao/{id}',['as'=>'acao', 'uses'=>'AcaoController@show']);


    Route::get('acao/{id}/editar','AcaoController@edit');
    Route::post('acao/{id}/atualizar','AcaoController@update');
    Route::get('acao/{id}/deletedReason',['as'=>'razao', 'uses'=>'AcaoController@deletedReason']);
    Route::post('acao/{id}/deletedReasonG','AcaoController@deletedReasonGravar');
    Route::get('acao/{id}/excluir','AcaoController@destroy');
    Route::get('acao/{id}/rifar','AcaoController@sorteio');

	Route::group(['middleware' => 'role:admin'],function(){
		Route::get('admin','MensagemADMController@index');
		Route::get('mensagem_adm','MensagemADMController@index');
		Route::get('mensagem_adm/inserir','MensagemADMController@create');
		Route::post('mensagem_adm/inserir','MensagemADMController@store');

	});

    Route::group(['middleware' => 'auth'], function(){
        Route::post('carrinho/{id}',['as'=>'carrinho', 'uses'=>'AcaoController@checkout']);
    });


	Route::get('paypal', 'AcaoController@paypal');

	Route::post('paypal', 'AcaoController@paypal');

    Route::get('confirmacao',['as'=>'confirmacao', 'uses'=>'ConfirmacaoController@index'] );

});
