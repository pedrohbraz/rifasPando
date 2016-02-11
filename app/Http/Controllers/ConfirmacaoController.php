<?php

namespace App\Http\Controllers;

use App\Events\DissociaUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Transaction;
use Exception;
use PayPal\Exception\PayPalConnectionException;
use App\Events\SoftDeleteRifas;
use App\Rifa;
use Auth;

class ConfirmacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ATGFkB2ea6f0pM92jwBqkZ17kxsiftDvUhLHyXson-10AUs7n5TocpEc0sis7Cl_fMIxS8uQO04kPP8Q',     // ClientID
                'ENP_JPkc3e4Yl6VeHZ_0vgvEh0SYdtzkMvw_VGBrr2nJ67sg9RuKB_YF7y_k4bj-4t2U-_23MaAGV3vD'      // ClientSecret
            )
        );
        $status='';
        if(isset($_GET['success']) && $_GET['success'] == 'true'){


            $transaction = new Transaction();
            $amount = new Amount();

            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $apiContext);

            $amount->setCurrency($payment->transactions[0]->amount->getCurrency());
            $amount->setTotal($payment->transactions[0]->amount->getTotal());
            $amount->setDetails($payment->transactions[0]->amount->getDetails());

            $transaction->setAmount($amount);

            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);
            $execution->addTransaction($transaction);
            $rifas = $payment->transactions[0]->description;
            $rifas=explode(',',$rifas);


            try {
                foreach($rifas as $rifa) {
                    $aux = Rifa::find($rifa);
                    if($aux->id_comprador == NULL)
                    {
                        $aux->id_comprador = Auth::user()->id;
                        $aux->save();
                    } else
                    {
                        $status='Numeros de rifas ja foram escolhidos por outra pessoa, por favor escolha novamente.';
                        return view('confirmacao')->with('status', $status);
                    }
                }
                $result = $payment->execute($execution, $apiContext);
                try {
                    $payment = Payment::get($paymentId, $apiContext);
                } catch (Exception $ex) {
                    $status='Pagamento ainda sem confirmacao';
                }
            } catch (Exception $ex) {
                $status='Compra nao foi executada';
            }

            if($result->state=="approved"){
                $status='Compra feita com sucesso!';
            }
            return view('confirmacao')->with('status',$status);

        }else {
            $status='Compra cancelada pelo usuario';
            return view ('confirmacao')->with('status',$status);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
