<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('front.checkout');
    }

}
