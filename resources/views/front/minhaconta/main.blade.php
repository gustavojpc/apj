@extends('front.layout.main')
@section('title','ADMIN | Minha Conta')

<link rel="stylesheet" href="{{asset('assets/css/myaccount.css')}}">
@section('content')

        <div class="d-flex flex-column" id="div_body" >
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
                    <div class="col-md-3 align-items-end" id='aside_menu'>
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



