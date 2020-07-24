<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $produtos=Produto::all();
        return view('front.index',compact('produtos'));
    }
    public function produtos(){
        $produtos=Produto::all();
        return view('front.loja',compact('produtos'));
    }
    public function detalhe_produto(){
        return view('front.detalhe_produto');
    }
    public function sobre(){
        return view('front.sobre');
    }
}
