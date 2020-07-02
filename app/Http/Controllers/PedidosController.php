<?php

namespace App\Http\Controllers;

use App\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function Pedidos($type='')
    {
        if ($type='pendentes') {
            $pedidos=Pedidos::where('entregue','0')->get();
        }elseif ($type='entregues') {
            $pedidos=Pedidos::where('entregue','1')->get();
        }else{
            $pedidos=Pedidos::all();
        }

        return view('admin.pedidos.pedidos',compact('pedidos'));
    }
}
