<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Produto;
use App\Providers;

use Illuminate\Http\Request;

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
        return view('admin.produto.novo',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required',
            'valor'=>'required',
            'descricao'=>'required',
            'image'=>'image|mime:png,jpg,jpeg|max;10000',
            'categoria'=>'required ',
            ],[
            'nome.required' => 'É necessário digitar um nome para o produto',
            'valor' => 'É necessário digitar o preço do produto',
            'descricao.required' => 'É necessário descrever o produto',
            'categoria.required' => 'É necessário selecionar a categoria do produto',
            'image.image' => 'Selecione uma imagem',
            'image.uploaded' => 'Selecione uma imagem de no máximo 10MB',

        ]);


        $formInput = $request->except('image');
        $image=$request->image;
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
}
