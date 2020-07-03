<?php

namespace App;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;

class Pedidos extends Model
{
    protected $fillable=['total','entregue'];

    public function ItensPedido()
    {
        return $this->belongsToMany(Produto::class) -> withPivot('qtde','total') ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function Createorder()
    {
        $user=Auth::user();
        $pedido=$user->Pedidos()->create([
            'total'=> Cart::total(),
            'entregue' => 0
        ]);

        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {

            $pedido->ItensPedido()->attach($cartItem->id,[
                'qtde'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price
            ]);
        }
    }
}


