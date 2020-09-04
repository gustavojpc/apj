<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unidades = Unidade::all();
        return view ('admin.unidades.index',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.unidades.novo');
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
        $validator = Validator::make($request->all(), Unidade::$rules, Unidade::$messages)
        ->validate();
        $formInput = $request -> all();
        Unidade::create($formInput);
        session()->flash('success', 'Unidade adicionada com sucesso');
        return view('admin.unidades.novo');
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
        $unidade = Unidade::findOrFail($id);

        return view('admin.unidades.novo',compact('unidade'));
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
        $unidade = Unidade::findOrFail($id);
        $validator = Validator::make($request->all(), Unidade::$rules, Unidade::$messages)
        ->validate();
        $unidade->update($request->all());
        session()->flash('success', 'Unidade editada com sucesso');
        return view('admin.unidades.novo');
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
