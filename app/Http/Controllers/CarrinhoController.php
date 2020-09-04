<?php

namespace App\Http\Controllers;

use App\Produto;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cartItems = Cart::content();
        $produtos=Produto::all();

        for ($i=1; $i <= 10; $i++) {
            $qtde[$i] = $i;
        }
        return view('carrinho.index',compact('cartItems','produtos','qtde'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($produtoid)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $produto = Produto::find($request->id);
        $request['qty'] = str_replace(['R$','.',','],['','.','.'], $request['qty']);

        Cart::add($request->id,$produto->nome,$request->qty,$produto->valor,['size' => $produto->unidade->sigla]);

        return redirect()->route('carrinho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {
        return [
            'endereco.required' => 'É obrigatorio preencher o endereço'
        ];
    }
    public function edit($id)
    {

        $produto = Produto::find($id);

        Cart::add($id,$produto->nome,1,$produto->valor,['size' => $produto->unidade->sigla]);
        return redirect()->route('carrinho.index');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['qty'] = str_replace(['R$','.',','],['','.','.'], $request['qty']);
        Cart::update($id,$request->qty);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
