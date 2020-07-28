<?php

namespace App;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;

class Pedidos extends Model
{
    protected $fillable=['total','entregue','endereco_id'];

    public function ItensPedido()
    {
        return $this->belongsToMany(Produto::class) -> withPivot('qtde','total') ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public static function Createorder($endereco)
    {
        $user=Auth::user();
        $pedido=$user->Pedidos()->create([
            'total'=> Cart::total(),
            'entregue' => 0,
            'endereco_id' => $endereco
        ]);

        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {

            $pedido->ItensPedido()->attach($cartItem->id,[
                'qtde'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price
            ]);
        }
        return $pedido->id;
    }
    public function scopeofFilters($query){
        if(request('cliente')){
            $query->where('user_id',request('cliente'));
        }
        if(request('datainicio')){
            $query->whereDate('created_at','>=',request('datainicio'))
            ->whereDate('created_at','<=',request('datafim'));
        }
        if(request('data')){
            $query->whereDate('created_at','=',request('data'));
        }
        if(request('status')){

            if(request('status') == 1){

                $query->where('entregue','0');
            }
            if(request('status') == 2){
                $query->where('entregue','1');
            }
        }


        return $query;
    }
    public function scopeofData($query,$data){


        $query->whereDate('created_at','=',$data);



        return $query;
    }
}


