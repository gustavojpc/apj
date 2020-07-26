<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    public function Vendas()
    {
        return view('admin.relatorios.vendas');
    }
}
