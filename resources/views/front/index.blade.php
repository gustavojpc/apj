@extends('front.layout.main')
@section('content')
    <main>

        <!-- slider Area Start -->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/hero_man.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                    <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">Best Cloth dddCollection By 2020!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/hero_man.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                    <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                    </div>
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


                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="single-product mb-60">

                                    <div class="product-caption text-bottom">
                                        <h3>{{$produto->nome}}</h3>
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
                                        Add to Cart
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

                <div class="row justify-content-between">

                    <div class="col-lg-6">
                        <div class="feature_part_tittle">
                            <h3>Credibly innovate granular
                            internal or organic sources
                            whereas standards.</h3>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="feature_part_content">
                            <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="assets/img/icon/feature_icon_1.svg" alt="#">
                            <h4>Credit Card Support</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="assets/img/icon/feature_icon_2.svg" alt="#">
                            <h4>Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="assets/img/icon/feature_icon_3.svg" alt="#">
                            <h4>Free Delivery</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_feature_part">
                            <img src="assets/img/icon/feature_icon_4.svg" alt="#">
                            <h4>Product with Gift</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature part end -->


        <!-- Shop Method End-->


    </main>


@endsection
