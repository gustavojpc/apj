@extends('front.layout.main')
@section('title','APJ | Páginal Inicial')
@section('content')
    <main>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif
        <!-- slider Area Start -->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height" data-background="none">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/hero_man.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInRight" data-delay=".6s">Comercio<BR>Solidário</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">A Economia Popular Solidária (EPS) é uma estratégia de desenvolvimento sustentável e solidário</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="{{ url('/produtos') }}" class="btn hero-btn">Compre agora</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- Category Area End-->
        <!-- Latest Products Start -->
        <section class="latest-product-area padding-bottom">
            <div class="container">
                <div class="row product-btn d-flex justify-content-end align-items-end">
                    <!-- Section Tittle -->
                    <div class="col-xl-12 col-lg-5 col-md-5 text-center">
                        <div class="section-tittle mb-30">
                            <h2>Produtos</h2>
                        </div>
                    </div>

                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">

                            @forelse ($produtos->chunk(4) as $chunk)
                            @foreach ($chunk as $produto)


                            <div class="col-xl-3 col-lg-3 col-md-2">
                                <div class="single-product mb-60">

                                    <div class="product-caption text-bottom">
                                        <p class="titulo">{{$produto->nome}}</p>
                                    </div>
                                    <div class="product-img">
                                        <img src="{{ url('images', $produto->image) }}" alt="">

                                    </div>
                                    <div class="product-caption text-bottom">


                                        <div class="price">
                                            <ul>
                                                <li>R$ {{$produto->valor}}</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <a href="{{route('carrinho.edit',$produto->id)}}" class="button expanded add-to-cart">
                                       Comprar <i class="fas fa-cart-plus    "></i>
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
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->

        <!-- feature part here -->
        <section class="feature_part section_padding" style="background-color: #dddddd; padding-top: 30px;">
            <div class="container">

                <div class="row product-btn d-flex justify-content-end align-items-end">
                    <!-- Section Tittle -->
                    <div class="col-xl-8 col-lg-5 col-md-5">
                        <div class="section-tittle mb-30">
                            <h2>Conheça a APJ</h2>
                        </div>
                    </div>

                </div>


        </section>
        <!-- feature part end -->


        <!-- Shop Method End-->


    </main>


@endsection
