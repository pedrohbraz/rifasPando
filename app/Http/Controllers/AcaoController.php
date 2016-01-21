<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Acao;
use DB;
use App\Events\GeracaoDeRifas;
use Auth;
use Storage;

class AcaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtem todas as acoes para serem listadas
        $acaos = Acao::all();
        return view('acaos',compact('acaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('acao_inserir');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Cria o objeto Acao a ser inserido
        $acao = new Acao;

        $acao->user_id          = Auth::user()->id;
        $acao->nome_acao        = $request->nome_acao;
        $acao->descricao        = $request->descricao;
        $acao->quantidade_rifas = $request->quantidade_rifas;
        $acao->valor_rifa       = $request->valor_rifa;
        $acao->data_sorteio     = $request->data_sorteio;
        $acao->forma_entrega    = $request->forma_entrega;

        //Cria e salva as rifas
        $quantidade_rifas = $acao->quantidade_rifas;

        //Salva a acao
        $acao->save();

        //Armazenamento da imagem
        $arquivo    = $request->file('imagem');
        $extension  = $arquivo->getClientOriginalExtension();
        $image_name = 'acao'.$acao->id;
        $path       = $arquivo->getRealPath();
        
        Storage::put('acaos/'.$image_name.'.'.$extension,file_get_contents($path));
        $acao->imagem = '/image/acaos/'.$image_name;
        $acao->save();

        //Dispara o evento de geracao de rifas
        \Event::fire(new GeracaoDeRifas($acao));

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $acao   = Acao::find($id);
        //dd($acao->mensagem);
        return view('acao', compact('acao'));

    }

    public function acaosUser($id)
    {

    //  $acao = Acao::find($id_usuario);
    $acao = DB::select('select * from acaos where id_usuario  = ?',[$id]);
    return view('Users.acoesCriadas',compact('acao'));
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
