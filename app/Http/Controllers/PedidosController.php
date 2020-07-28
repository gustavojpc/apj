<?php

namespace App\Http\Controllers;

use App\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function Pedidos($type='')
    {

        $status = 3;

        $data = date('Y-m-d');
        $cliente = null;
        $pedidos=Pedidos::ofData($data);
        if(request('status')){
            $status = request('status');
        }
        if(request('data')){
            $data = request('data');
        }
        if(request('cliente')){
            $cliente = request('cliente');

        }
        $pedidos = Pedidos::ofData($data)->ofFilters()->paginate(20);

        return view('admin.pedidos.pedidos',compact('pedidos','data','status','cliente'));
    }

    public function Entregar($id)
    {
        $pedidos=Pedidos::findOrFail($id);
        if($pedidos->entregue==0)
            $pedidos->update(['entregue'=>'1']);
        else
            $pedidos->update(['entregue'=>'0']);
        return back();
    }

}
