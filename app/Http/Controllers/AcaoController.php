<?php

namespace App\Http\Controllers;

use App\MensagemAdm;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Acao;
use App\Rifa;
use DB;
use App\Events\GeracaoDeRifas;
use Auth;
use Storage;
use App\User;
//PayPal
use PayPal\Api\Amount;
use PayPal\Api\CreditCard;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Exception\PayPalConnectionException;

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
        $mensagem = MensagemAdm::all()->last();

        return view('acaos')->with('acaos', $acaos)->with('mensagem', $mensagem);
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

        return redirect('/perfil');
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

    public function acaosOrgAndamento($id)
    {
    $hoje = getdate();
    $hoje2 = $hoje['year'].'-'.$hoje['mon'].'-'.$hoje['mday'];
    $acao = DB::table('acaos')->select('*')
               ->where('data_sorteio','>=',$hoje2)
               ->where('user_id','=',$id)
               ->get();

    return view('Users.acoesOrgAndamento',compact('acao'));
   }

   public function acaosCompAndamento($id)
   {
     $hoje = getdate();
     $hoje2 = $hoje['year'].'-'.$hoje['mon'].'-'.$hoje['mday'];

     $rifas = DB::table('rifas')
               ->join('acaos','rifas.acao_id','=','acaos.id')
               ->where('rifas.id_comprador','=',$id)
               ->where('acaos.data_sorteio','>',$hoje2)
               ->get();

      return view('Users.acoesCompAndamento',compact('rifas'));
    }


public function acaosOrgClosed($id)
  {

    $hoje = getdate();
    $hoje2 = $hoje['year'].'-'.$hoje['mon'].'-'.$hoje['mday'];
    $acao = DB::table('acaos')->select('*')
               ->where('data_sorteio','<',$hoje2)
               ->where('user_id','=',$id)
               ->get();
    return view('Users.acoesOrgClosed',compact('acao'));
  }

  public function acaosCompClosed($id)
    {

      $hoje = getdate();
      $hoje2 = $hoje['year'].'-'.$hoje['mon'].'-'.$hoje['mday'];

     $rifas = DB::table('rifas')
               ->join('acaos','rifas.acao_id','=','acaos.id')
               ->where('rifas.id_comprador','=',$id)
               ->where('acaos.data_sorteio','<',$hoje2)
               ->get();
     //dd($rifas);

      return view('Users.acoesCompClosed',compact('rifas'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $acao   = Acao::find($id);
      //dd($acao->mensagem);
      return view('Acaos.acaoEdit', compact('acao'));
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

      $acao = Acao::find($id);
      $acao->descricao = $request->descricao;
      $acao->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $acao = Acao::find($id);
          //dd($acao);
          $acao -> delete();

          return redirect('/perfil');
    }

    public function carrinhoDeCompras()
    {
        return view('shopping_cart');
    }

    public function checkout($id)
    {
        $acao = Acao::find($id);
        $checkboxCount = isset($_POST['checkbox']) ? count($_POST['checkbox']):0;
        $rifas = "";
        if(isset($_POST['checkbox']) && !empty($_POST['checkbox'])){
            foreach($_POST['checkbox'] as $key=>$checkbox){
                if($checkboxCount-1!=$key)$rifas.=$checkbox.", ";
                else $rifas.=$checkbox;
            }
        }
        return view('checkout',compact('acao','checkboxCount','rifas'));
    }

    public function paypal(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ATGFkB2ea6f0pM92jwBqkZ17kxsiftDvUhLHyXson-10AUs7n5TocpEc0sis7Cl_fMIxS8uQO04kPP8Q',     // ClientID
                'ENP_JPkc3e4Yl6VeHZ_0vgvEh0SYdtzkMvw_VGBrr2nJ67sg9RuKB_YF7y_k4bj-4t2U-_23MaAGV3vD'      // ClientSecret
            )
        );

        // ### Payer

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // ### Itemized information

        $item1 = new Item();
        $item1->setName($request->nome)
            ->setCurrency('BRL')
            ->setQuantity($request->quantidade)
            ->setSku($request->rifas) // Similar to `item_number` in Classic API
            ->setPrice($request->valor);
        $item2 = new Item();


        $itemList = new ItemList();
        $itemList->addItem($item1);

        // ### Additional payment details
        $shipping = 0.1 * $request->total;
        $tax      = 0.08 * $request->total;

        $details = new Details();
        $details->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal($request->total);

        // ### Amount
        $amount = new Amount();
        $amount->setCurrency("BRL")
            ->setTotal($request->total + $tax + $shipping)
            ->setDetails($details);

        // ### Transaction

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Redirect urls

        $baseUrl = "http://localhost:8000";
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl")
            ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");

        // ### Payment

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


        // For Sample Purposes Only.
        $request = clone $payment;

        // ### Create Payment

        try {
            $payment->create($apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
//            echo("Erro. Nao foi possivel criar o pagamento nesta sessao.");
//            exit(1);
            echo $ex->getCode(); // Prints the Error Code
            echo $ex->getData(); // Prints the detailed error message
            die($ex);
        }catch (Exception $ex) {
            die($ex);
        }

        // ### Get redirect url
        // The API response provides the url that you must redirect
        // the buyer to. Retrieve the url from the $payment->getApprovalLink()
        // method
        $approvalUrl = $payment->getApprovalLink();

        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        echo("Created Payment Using PayPal. Please visit the URL to Approve.");
        return redirect($approvalUrl);

    }
}
