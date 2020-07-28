<?php

namespace App\Http\Controllers;

use App\Pedidos;
use App\User;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    public function Vendas()
    {
        $pedidos=Pedidos::all();
        $cliente = null;
        $datainicio = date('Y-m-d');
        $datafim = date('Y-m-d');

        if(request('cliente')){
            $cliente = request('cliente');

        }
        if(request('datainicio')){
            $datainicio = date(request('datainicio'));
        }
        if(request('datafim')){

            $datafim = date(request('datafim')) ;
        }

        $pedidos = Pedidos::ofFilters()->paginate(20);

        return view('admin.relatorios.vendas',compact('pedidos','datainicio','datafim','cliente'));
    }
    public function Clientes()
    {
        $clientes=User::where('admin','');
        $codigo = null;
        $nome = null;
        $email = null;

        if(request('codigo')){
            $codigo = request('codigo');

        }
        if(request('nome')){
            $nome = request('nome');
        }
        if(request('email')){

            $email = request('email') ;
        }

        $clientes = User::ofFilters()->paginate(20);

        return view('admin.relatorios.clientes',compact('clientes','codigo','nome','email'));
    }
}
