<?php

namespace App\Http\Controllers;

use App\Endereco;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class CheckoutController extends Controller
{
    //
    /*public function Passo1()
    {
        if(Auth::check()){
            return redirect() ->route('checkout.entrega');
        }else{
            return redirect('login');
        }

    }*/

    public function entrega()
    {
        $ultimoendereco=Endereco::where('user_id',auth()->user()->id)
        ->orderBy('created_at','DESC')->first();

        $cartItems = Cart::content();

        return view('front.checkout',compact('ultimoendereco','cartItems'));


    }
    public function GerarPDF()
    {
        $pdf = PDF::loadview('front.pdfpedido');
        return $pdf ->setPaper('a4')->stream('PedidoAPJ.pdf');

    }

}
