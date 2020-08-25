<?php

namespace App\Http\Controllers;


use App\Endereco;
use App\Pedidos;
use App\User;
use Composer\DependencyResolver\Request;

class MinhacontaController extends Controller
{

    public function pedidos()
    {

        $user = User::where('id',auth()->user()->id)->first();

        $pedidos = Pedidos::where('user_id',auth()->user()->id)->paginate(20);
        return view('front.minhaconta.pedidos',compact('user','pedidos'));
    }

    public function alterar()
    {
        //
    }

    public function endereco()
    {
        $ultimoendereco=Endereco::where('user_id',auth()->user()->id)
        ->orderBy('created_at','DESC')->first();
        return view('front.minhaconta.endereco', compact('ultimoendereco'));
    }



}
