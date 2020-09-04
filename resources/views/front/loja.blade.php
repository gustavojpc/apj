@extends('front.layout.main')
@section('title','APJ | Loja')
@section('content')

    <!-- slider Area Start-->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2 class="titulo-pagina">Produtos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- product list part start-->
    <section class="product_list section_padding" style="padding-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product_sidebar" style="box-shadow: 3px 3px 5px 6px #ccc;">
                        <div class="single_sedebar">


                                <form action="{{ url('/produtos')}}">
                                    @csrf
                                <input type="text" placeholder="Busque produtos" value="{{$filternome!=null? $filternome : ''}}" name="search" >



                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Categoria <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">

                                    @foreach ($categorias as $categoria)

                                    <p> <input type="checkbox" name="categorias_id[]" value="{{$categoria->id}}"  {{$filtercategorias!=null? in_array($categoria->id,$filtercategorias)? 'checked' : '' : ''}} id="confirm-checkbox">
                                        <a>{{$categoria->nome}}</p></a>
                                    @endforeach




                                </div>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option text-center " style="padding-bottom: 10px">
                                <button type="submit" class="genric-btn primary small" >Buscar</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                        <div class="row">

                            @forelse ($produtos as $produto)


                                <div class="col-lg-4 col-sm-3">
                                    <div class="single_product_item text-center">
                                        <h3> <a href="produtos/detalhe/{{$produto->slug}}">{{$produto->nome}}</a> </h3>
                                        <img src="{{ url('images', $produto->image) }}" alt="" class="img-fluid" style="height: 150px">

                                        <p>R$ {{$produto->valor}}</p>
                                        <a href="produtos/detalhe/{{$produto->slug}}" class="button expanded add-to-cart">
                                            Ver produto
                                        </a>
                                    </div>
                                </div>






                            @empty
                                <div class="row sem-resultado">
                                    <div class="text-center">
                                        <h4>Não foi encontrado nenhum produto com esses parâmetros de busca </h4>
                                    </div>

                                        <h5>Precisa de ajuda? Entre em contato conosco.<br> Mostrando outros produtos</h5>


                                </div>



                                @foreach ($SemProdutos->chunk(4) as $chunk)
                                    @foreach ($chunk as $produto)

                                    <div class="col-lg-4 col-sm-3">
                                        <div class="single_product_item text-center">
                                            <h3> <a href="single-product.html">{{$produto->nome}}</a> </h3>
                                            <img src="{{ url('images', $produto->image) }}" alt="" class="img-fluid" style="height: 150px">

                                            <p>R$ {{$produto->valor}}</p>
                                            <a href="produtos/detalhe/{{$produto->slug}}" class="button expanded add-to-cart">
                                                Ver produto
                                            </a>
                                        </div>
                                    </div>

                                    @endforeach
                                @endforeach

                            @endforelse


                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->


@endsection


