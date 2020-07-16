<?php

namespace App\Http\Controllers;

use App\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function Pedidos($type='')
    {


        $pedidos=Pedidos::all();


        return view('admin.pedidos.pedidos',compact('pedidos'));
    }

    public function Entregar($id)
    {
        $pedidos=Pedidos::findOrFail($id);
        $pedidos->update(['entregue'=>'1']);
        return back();
    }

}
