<?php

namespace App\Http\Controllers;
use PDF;
use App\Endereco;
use App\Pedidos;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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


        $validator = Validator::make($request->all(), Endereco::$rules, Endereco::$messages)
        ->validate();

        $endereco = Auth::user()->endereco()->create($request->all());
        $ultimoendereco=Endereco::where('user_id',auth()->user()->id)
        ->orderBy('created_at','DESC')->first();
        if(request('fecharpedido') == true){

            $id = Pedidos::Createorder($endereco->id);
            $pedido=Pedidos::where('id',$id)->get();
            $idpedido=Pedidos::where('id',$id)->first();

            $itenspedido=DB::table('pedidos_produto')
            ->join('produtos', 'produto_id', '=', 'produtos.id')
            ->join('unidades', 'produtos.unidade_id', '=', 'unidades.id')
            ->where('pedidos_id', $idpedido->id)->get();
            $pdf = PDF::loadview('front.pdfpedido',compact('pedido','ultimoendereco','itenspedido'));
            return $pdf ->setPaper('a4')->stream('PedidoAPJ.pdf');
        }
        else
        {

            return view('front.minhaconta.endereco',compact('ultimoendereco'));
        }

        //return redirect('/')->with('success', 'Pedido finalizado com sucesso');
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
    public function edit($id)
    {
        //
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
        //
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
    // public function criar(Request $request)
    // {
    //     //não cria view, mas um novo endereço.
    //     $validator = Validator::make($request->all(), Endereco::$rules, Endereco::$messages)
    //     ->validate();
    //     $endereco = Auth::user()->endereco()->create($request->all());
    //     $ultimoendereco=Endereco::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->first();
    //     return (0);
    // }
}
