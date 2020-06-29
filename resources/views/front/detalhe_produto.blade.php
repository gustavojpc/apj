@extends('front.layout.main')
@section('content')

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>product list</h2>
                        </div>
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
                <div class="col-md-6">
                    <div class="product_sidebar" style="box-shadow: 3px 3px 5px 6px #ccc; padding: 50px; margin-right: 15px">
                        <img src="https://images-americanas.b2w.io/produtos/01/00/img/360560/5/360560538_1SZ.jpg" alt="" class="img-fluid produto_detalhe_imagem">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product_list">
                        <div class="row">
                            <div class="produto_detalhe_texto text-left">
                                <p class="nome-produto"> Nome
                                <p> Descricao</p>

                                <p>R$ Valor</p>
                                <a href="{{url('/detalhe_produto')}}" class="button expanded add-to-cart">
                                    Adicionar ao carrinho
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->
@endsection
