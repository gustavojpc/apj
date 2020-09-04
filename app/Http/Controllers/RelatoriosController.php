<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use App\Pedidos;
use App\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use PDF;

class RelatoriosController extends Controller
{
    public function Vendas()
    {
        $pedidos=Pedidos::all();
        $cliente = null;
        $datainicio = date('Y-m-d');
        $datafim = date('Y-m-d');

        if(request('cliente')){
            $cliente = request('cliente');

        }
        if(request('datainicio')){
            $datainicio = date(request('datainicio'));
        }
        if(request('datafim')){

            $datafim = date(request('datafim')) ;
        }

        $pedidos = Pedidos::ofFilters()->paginate(20);

        return view('admin.relatorios.vendas',compact('pedidos','datainicio','datafim','cliente'));
    }
    public function Clientes()
    {
        $clientes=User::where('admin','');
        $codigo = null;
        $nome = null;
        $email = null;

        if(request('codigo')){
            $codigo = request('codigo');

        }
        if(request('nome')){
            $nome = request('nome');
        }
        if(request('email')){

            $email = request('email') ;
        }

        $clientes = User::ofFilters()->paginate(20);

        return view('admin.relatorios.clientes',compact('clientes','codigo','nome','email'));
    }
    public function Meses()
    {

        $Mes                = date('m');
        $Ano                = date('y');
        $Diamaisvendido     = -1;
        $Vendasdomelhordia  = 0;

        if(request('Ano')){
            $Ano = request('Ano');
        }
        if(request('Mes')){
            $Mes = request('Mes');
        }

        $pedidos = Pedidos::whereYear('created_at', '=', $Ano)->whereMonth('created_at', '=', $Mes)->get();


        $produtomaisvendido = DB::select
        (
        'select nome from
            (select max(quantidadedevendas), nome from
            (SELECT count(pp.produto_id) as quantidadedevendas, pr.nome
                from pedidos p
                inner join pedidos_produto pp on (pp.pedidos_id = p.id)
                inner join produtos pr on (pr.id = pp.produto_id)
                where month(p.created_at)=? and
                            year(p.created_at)=?
                group by pp.produto_id ) as a) as b;'
                , [$Mes, $Ano]
        );
        $vendaporcategoria = DB::select
        ('
        SELECT C.Nome as Nome, SUM(pp.total) as Valor FROM categorias C
        INNER JOIN produtos p ON (p.categoria_id=C.id)
        INNER JOIN pedidos_produto pp ON (pp.produto_id=p.id)

                WHERE month(pp.created_at)=? AND
                year(pp.created_at)=?
                GROUP BY C.nome '
                , [$Mes, $Ano]
        );
        for ($i=1; $i <=date('t') ; $i++)
        {
            $Vendasdodia = Pedidos::whereYear('created_at', '=', $Ano)->whereMonth('created_at', '=', $Mes)->whereDay('created_at', '=', $i)->get();
            $Vendasdodia = count($Vendasdodia);

            if($Vendasdodia > $Vendasdomelhordia)
            {
                $Vendasdomelhordia = $Vendasdodia;
                $Diamaisvendido = $i;
            }
        }
        $VendaPorDia = Pedidos::select(DB::raw('Date(created_at) as Data'),DB::raw('sum(total) as Total'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        return view('admin.relatorios.meses',compact('VendaPorDia','pedidos','Mes','Ano', 'Diamaisvendido', 'Vendasdomelhordia',
        'produtomaisvendido','vendaporcategoria'));
    }


    public function GerarPDF()
    {
        $Mes                = date('m');
        $Ano                = date('y');
        $Diamaisvendido     = -1;
        $Vendasdomelhordia  = 0;
        dd(request('Ano'));
        if(request('Ano')){
            $Ano = request('Ano');
        }
        if(request('Mes')){
            $Mes = request('Mes');
        }

        $pedidos = Pedidos::whereYear('created_at', '=', $Ano)->whereMonth('created_at', '=', $Mes)->get();


        $produtomaisvendido = DB::select
        (
        'select nome from
            (select max(quantidadedevendas), nome from
            (SELECT count(pp.produto_id) as quantidadedevendas, pr.nome
                from pedidos p
                inner join pedidos_produto pp on (pp.pedidos_id = p.id)
                inner join produtos pr on (pr.id = pp.produto_id)
                where month(p.created_at)=? and
                            year(p.created_at)=?
                group by pp.produto_id ) as a) as b;'
                , [$Mes, $Ano]
        );
        $vendaporcategoria = DB::select
        ('
        SELECT C.Nome as Nome, SUM(pp.total) as Valor FROM categorias C
        INNER JOIN produtos p ON (p.categoria_id=C.id)
        INNER JOIN pedidos_produto pp ON (pp.produto_id=p.id)

                WHERE month(pp.created_at)=? AND
                year(pp.created_at)=?
                GROUP BY C.nome '
                , [$Mes, $Ano]
        );
        for ($i=1; $i <=date('t') ; $i++)
        {
            $Vendasdodia = Pedidos::whereYear('created_at', '=', $Ano)->whereMonth('created_at', '=', $Mes)->whereDay('created_at', '=', $i)->get();
            $Vendasdodia = count($Vendasdodia);

            if($Vendasdodia > $Vendasdomelhordia)
            {
                $Vendasdomelhordia = $Vendasdodia;
                $Diamaisvendido = $i;
            }
        }
        $VendaPorDia = Pedidos::select(DB::raw('Date(created_at) as Data'),DB::raw('sum(total) as Total'))
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $pdf = PDF::loadview('admin.relatorios.pdfmensal',compact('produtomaisvendido'));
        return $pdf ->setPaper('a4')->stream('Relatório Mensal.pdf');

    }
}
