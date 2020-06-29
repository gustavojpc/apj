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
                <div class="col-md-3">
                    <div class="product_sidebar" style="box-shadow: 3px 3px 5px 6px #ccc;">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Category 1</a></p>
                                    <p><a href="#">Category 2</a></p>
                                    <p><a href="#">Category 3</a></p>
                                    <p><a href="#">Category 4</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Type <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Type 1</a></p>
                                    <p><a href="#">Type 2</a></p>
                                    <p><a href="#">Type 3</a></p>
                                    <p><a href="#">Type 4</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product_list">
                        <div class="row">

                            @forelse ($produtos->chunk(4) as $chunk)
                            @foreach ($chunk as $produto)

                            <div class="col-lg-4 col-sm-3">
                                <div class="single_product_item text-center">
                                    <h3> <a href="single-product.html">{{$produto->nome}}</a> </h3>
                                    <img src="{{ url('images', $produto->image) }}" alt="" class="img-fluid">

                                    <p>R$ {{$produto->valor}}</p>
                                    <a href="{{url('/detalhe_produto')}}" class="button expanded add-to-cart">
                                        Ver produto
                                    </a>
                                </div>
                            </div>


                            @endforeach

                            @empty
                                <h4>Sem produtos cadastrados</h4>
                            @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->
@endsection
