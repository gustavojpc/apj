@extends('front.layout.main')
@section('title','ADMIN | Minha Conta')

<style>
    a
    {
        color: black!important;
    }
    #div_body
    {
        background-color: rgba(255, 200, 137, 0.178)
    }
    #conteudo
    {
        background-color: aliceblue;
    }
    #linha
    {
        background-color: lightyellow;
    }
    #card-header,#card-footer
    {
        background-color: rgba(255, 166, 0, 0.787);
    }
    #primeiralinha
    {
        background-color: rgb(56, 55, 55);
        color: rgb(202, 199, 199);
    }
</style>
@section('content')

        <div class="d-flex flex-column" id="div_body" style="height: 80vh">
            <div class="container-fluid" >
                <div class="row" style="height: 10vh"></div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6 align-items-start">
                        <!-- Main content -->
                        @yield('conteudo')
                        <!-- /.content -->
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3 align-items-end">
                        <div class="card text-center">
                            <h5 class="card-header" id="card-header">
                                <a href="#" class="d-block"> <i class="fa fa-user" aria-hidden="true"></i>  {{Auth::user()->name}}</a>
                            </h5>

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item"><a href="{{ url('minhaconta/pedidos') }}"> <i class="fas fa-cart-arrow-down"></i> Pedidos</a></li>
                                <li class="list-group-item"><a href="{{ url('minhaconta/endereco') }}"><i class="fas fa-map-marker-alt"></i> Endereço</a></li>
                                <li class="list-group-item"><a href="{{ url('minhaconta/alterar') }}"><i class="fas fa-cogs"></i> Alterar Dados</a></li>
                            </ul>

                            <lt>
                                <lt class="lt-highlighter__wrapper">
                                    <lt class="lt-highlighter__scrollElement">
                                    </lt>
                                </lt>
                            </lt>
                            <div class="card-footer" id="card-footer">
                                <i class="fa fa-window-close" aria-hidden="true"></i>
                                Sair
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>


@endsection



