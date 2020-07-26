<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Produto;
use App\Providers;
use App\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produtos=Produto::all();
        return view('admin.produto.index',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias=Categoria::pluck('nome','id');
        $unidades=Unidade::pluck('descricao','id');
        return view('admin.produto.novo',compact('categorias','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Produto::$rules, Produto::$messages)
        ->validate();

        $formInput = $request->except('image');

        $image=$request->image;
        $formInput['valor'] = str_replace(['R$','.',','],['','','.'], $formInput['valor']);
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;

        }
        //

        Produto::create($formInput);
        return back()->with('success', 'Produto criado com sucesso');
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
        $produto = Produto::findOrFail($id);

        if ($request->hasFile('image')) {

            $formInput = $request->except('image');

            $image=$request->image;
            $formInput['valor'] = str_replace(['R$','.',','],['','','.'], $formInput['valor']);
            if($image){
                $imageName=$image->getClientOriginalName();
                $image->move('images',$imageName);
                $formInput['image'] = $imageName;

            }
            $produto ->update($formInput);
        }else{
            $request['image'] = $produto->image;
            $produto ->update($request->all());
        }
        $produtos=Produto::all();
        return back()->with('success', 'Produto editado com sucesso');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function deletar($id){
        $produto = Produto::findOrFail($id);
        $produto ->delete();
        \Session::flash('mensagem-sucesso','Produto deletado com sucesso');
        return back();
      }

      public function editar($id){
        $produto = Produto::findOrFail($id);
        $categorias=Categoria::pluck('nome','id');
        $unidades=Unidade::pluck('descricao','id');
        return view('admin.produto.novo',compact('categorias','unidades','produto'));

      }

      public function mudarestado($id){
        $produto = Produto::findOrFail($id);
        if($produto->visivel==1){

            $produto->update(['visivel'=>'0']);
        }else{

            $produto->update(['visivel'=>'1']);
        }

        return back();

      }

      public function Filtrar(Request $request)
      {
          dd($request);
      }

}
