<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Acao;
use App\Rifa;
use DB;
use App\Events\GeracaoDeRifas;
use Auth;
use Storage;
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



    public function paypal()
    {
        $PayPalConfig = array(
                    'Sandbox' => 'https://www.sandbox.paypal.com',
                    'APIUsername' => 'texugo.laranja@gmail.com',
                    'APIPassword' => '5774X35a',
                    'APISignature' => $api_signature,
                    'PrintHeaders' => $print_headers,
                    'LogResults' => $log_results,
                    'LogPath' => $log_path,
                    );

        $PayPal = new \angelleye\PayPal\PayPal($PayPalConfig);

        /*
         * Here we call GetExpressCheckoutDetails to obtain payer information from PayPal
         */
        $GECDResult = $PayPal -> GetExpressCheckoutDetails($_SESSION['SetExpressCheckoutResult']['TOKEN']);
        echo '<b>GetExpressCheckoutDetails</b><br /><pre>';
        print_r($GECDResult);
        echo '<br /><br /></pre>';

        $DECPFields = array(
                            'token' => $_SESSION['SetExpressCheckoutResult']['TOKEN'],                              // Required.  A timestamped token, the value of which was returned by a previous SetExpressCheckout call.
                            'payerid' => $GECDResult['PAYERID'],                            // Required.  Unique PayPal customer id of the payer.  Returned by GetExpressCheckoutDetails, or if you used SKIPDETAILS it's returned in the URL back to your RETURNURL.
                            'returnfmfdetails' => '1',                  // Flag to indicate whether you want the results returned by Fraud Management Filters or not.  1 or 0.
                            'giftmessage' => '',                        // The gift message entered by the buyer on the PayPal Review page.  150 char max.
                            'giftreceiptenable' => '',                  // Pass true if a gift receipt was selected by the buyer on the PayPal Review page. Otherwise pass false.
                            'giftwrapname' => '',                       // The gift wrap name only if the gift option on the PayPal Review page was selected by the buyer.
                            'giftwrapamount' => '',                     // The amount only if the gift option on the PayPal Review page was selected by the buyer.
                            'buyermarketingemail' => '',                // The buyer email address opted in by the buyer on the PayPal Review page.
                            'surveyquestion' => '',                     // The survey question on the PayPal Review page.  50 char max.
                            'surveychoiceselected' => '',               // The survey response selected by the buyer on the PayPal Review page.  15 char max.
                            'allowedpaymentmethod' => '',               // The payment method type. Specify the value InstantPaymentOnly.
                            'buttonsource' => ''                        // ID code for use by third-party apps to identify transactions in PayPal.
                        );

        $Payments = array();
        $Payment = array(
                        'amt' => '100.00',                          // Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
                        'currencycode' => 'USD',                    // A three-character currency code.  Default is USD.
                        'itemamt' => '80.00',                       // Required if you specify itemized L_AMT fields. Sum of cost of all items in this order.
                        'shippingamt' => '15.00',                   // Total shipping costs for this order.  If you specify SHIPPINGAMT you mut also specify a value for ITEMAMT.
                        'insuranceoptionoffered' => '',         // If true, the insurance drop-down on the PayPal review page displays the string 'Yes' and the insurance amount.  If true, the total shipping insurance for this order must be a positive number.
                        'handlingamt' => '',                    // Total handling costs for this order.  If you specify HANDLINGAMT you mut also specify a value for ITEMAMT.
                        'taxamt' => '5.00',                         // Required if you specify itemized L_TAXAMT fields.  Sum of all tax items in this order.
                        'desc' => 'This is a test order.',                          // Description of items on the order.  127 char max.
                        'custom' => '',                         // Free-form field for your own use.  256 char max.
                        'invnum' => '',                         // Your own invoice or tracking number.  127 char max.
                        'notifyurl' => '',                          // URL for receiving Instant Payment Notifications
                        'shiptoname' => '',                     // Required if shipping is included.  Person's name associated with this address.  32 char max.
                        'shiptostreet' => '',                   // Required if shipping is included.  First street address.  100 char max.
                        'shiptostreet2' => '',                  // Second street address.  100 char max.
                        'shiptocity' => '',                     // Required if shipping is included.  Name of city.  40 char max.
                        'shiptostate' => '',                    // Required if shipping is included.  Name of state or province.  40 char max.
                        'shiptozip' => '',                      // Required if shipping is included.  Postal code of shipping address.  20 char max.
                        'shiptocountry' => '',                  // Required if shipping is included.  Country code of shipping address.  2 char max.
                        'shiptophonenum' => '',                 // Phone number for shipping address.  20 char max.
                        'notetext' => 'This is a test note before ever having left the web site.',                      // Note to the merchant.  255 char max.
                        'allowedpaymentmethod' => '',           // The payment method type.  Specify the value InstantPaymentOnly.
                        'paymentaction' => 'Sale',                  // How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order.
                        'paymentrequestid' => '',               // A unique identifier of the specific payment request, which is required for parallel payments.
                        'sellerpaypalaccountid' => ''           // A unique identifier for the merchant.  For parallel payments, this field is required and must contain the Payer ID or the email address of the merchant.
                        );

        $PaymentOrderItems = array();
        $Item = array(
                    'name' => 'Widget 123',                             // Item name. 127 char max.
                    'desc' => 'Widget 123',                             // Item description. 127 char max.
                    'amt' => '40.00',                               // Cost of item.
                    'number' => '123',                          // Item number.  127 char max.
                    'qty' => '1',                               // Item qty on order.  Any positive integer.
                    'taxamt' => '',                             // Item sales tax
                    'itemurl' => 'http://www.angelleye.com/products/123.php',                           // URL for the item.
                    'itemweightvalue' => '',                    // The weight value of the item.
                    'itemweightunit' => '',                     // The weight unit of the item.
                    'itemheightvalue' => '',                    // The height value of the item.
                    'itemheightunit' => '',                     // The height unit of the item.
                    'itemwidthvalue' => '',                     // The width value of the item.
                    'itemwidthunit' => '',                  // The width unit of the item.
                    'itemlengthvalue' => '',                    // The length value of the item.
                    'itemlengthunit' => '',                     // The length unit of the item.
                    'ebayitemnumber' => '',                     // Auction item number.
                    'ebayitemauctiontxnid' => '',           // Auction transaction ID number.
                    'ebayitemorderid' => '',                // Auction order ID number.
                    'ebayitemcartid' => ''                  // The unique identifier provided by eBay for this order from the buyer. These parameters must be ordered sequentially beginning with 0 (for example L_EBAYITEMCARTID0, L_EBAYITEMCARTID1). Character length: 255 single-byte characters
                    );
        array_push($PaymentOrderItems, $Item);

        $Item = array(
                    'name' => 'Widget 456',                             // Item name. 127 char max.
                    'desc' => 'Widget 456',                             // Item description. 127 char max.
                    'amt' => '40.00',                               // Cost of item.
                    'number' => '456',                          // Item number.  127 char max.
                    'qty' => '1',                               // Item qty on order.  Any positive integer.
                    'taxamt' => '',                             // Item sales tax
                    'itemurl' => 'http://www.angelleye.com/products/456.php',                           // URL for the item.
                    'itemweightvalue' => '',                    // The weight value of the item.
                    'itemweightunit' => '',                     // The weight unit of the item.
                    'itemheightvalue' => '',                    // The height value of the item.
                    'itemheightunit' => '',                     // The height unit of the item.
                    'itemwidthvalue' => '',                     // The width value of the item.
                    'itemwidthunit' => '',                  // The width unit of the item.
                    'itemlengthvalue' => '',                    // The length value of the item.
                    'itemlengthunit' => '',                     // The length unit of the item.
                    'ebayitemnumber' => '',                     // Auction item number.
                    'ebayitemauctiontxnid' => '',           // Auction transaction ID number.
                    'ebayitemorderid' => '',                // Auction order ID number.
                    'ebayitemcartid' => ''                  // The unique identifier provided by eBay for this order from the buyer. These parameters must be ordered sequentially beginning with 0 (for example L_EBAYITEMCARTID0, L_EBAYITEMCARTID1). Character length: 255 single-byte characters
                    );
        array_push($PaymentOrderItems, $Item);

        $Payment['order_items'] = $PaymentOrderItems;
        array_push($Payments, $Payment);

        $UserSelectedOptions = array(
                                     'shippingcalculationmode' => '',   // Describes how the options that were presented to the user were determined.  values are:  API - Callback   or   API - Flatrate.
                                     'insuranceoptionselected' => '',   // The Yes/No option that you chose for insurance.
                                     'shippingoptionisdefault' => '',   // Is true if the buyer chose the default shipping option.
                                     'shippingoptionamount' => '',      // The shipping amount that was chosen by the buyer.
                                     'shippingoptionname' => '',        // Is true if the buyer chose the default shipping option...??  Maybe this is supposed to show the name..??
                                     );

        $PayPalRequest = array(
                               'DECPFields' => $DECPFields,
                               'Payments' => $Payments
                               );

        $_SESSION['PayPalResult'] = $PayPal -> DoExpressCheckoutPayment($PayPalRequest);

        echo '<pre />';
        print_r($_SESSION['PayPalResult']);

    public function carrinhoDeCompras()
    {
        return view('shopping_cart');
    }

    public function checkout(Request $request)
    {
        $rifa = $request;
        return view('checkout',compact('rifa'));
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
        $item1->setName($request->name)
            ->setCurrency('BRL')
            ->setQuantity($request->quantidade)
            ->setSku("123123") // Similar to `item_number` in Classic API
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

        $baseUrl = "http://rifas.pando";
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
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            echo("Erro. Nao foi possivel criar o pagamento nesta sessao.");
            exit(1);
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
