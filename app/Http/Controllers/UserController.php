<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function create()
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
        $user = User::findOrFail($id);
        $user ->update($request->all());

        return back()->with('success', 'Cliente editado com sucesso');;
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

    public function atualizarperfil(Request $request)
    {
        $data = $request->all();

        if($data['password'] != null){
            if($data['password'] == $data['password_confirmation']){
                $data['password'] = bcrypt($data['password']);

            }
            else{

                return back()->with('error', 'Ambas as senhas devem concidir...');
            }
        }
        else{
            unset($data['password']);
        }

        $update = auth()->user()->update($data);

        if ($update)
            return back()->with('success', 'Sucesso ao Atualizar');

        return  back()->with('error', 'Falha ao atualizar o perfil...');
    }

}
