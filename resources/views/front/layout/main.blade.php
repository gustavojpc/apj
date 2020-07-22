<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">


		<!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">



   </head>

   <body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="https://apjuntos.org.br/wp-content/uploads/2016/05/cropped-logo-apj-wp-glow.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">

               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                                <div class="logo">
                                  <a href="{{url('/')}}"><img src="https://apjuntos.org.br/wp-content/uploads/2016/05/cropped-logo-apj-wp-glow.png" alt=""></a>

                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{url('/')}}">Página inicial</a></li>
                                            <li><a href="{{url('/produtos')}}">Loja</a></li>
                                            <li><a href="Galeria.html">Galeria</a></li>
                                            <li><a href="Galeria.html">Comunicados</a></li>
                                            <li><a href="Galeria.html">Contato</a></li>
                                            @auth
                                                <li class="show-login"><a href="Galeria.html">{{Auth::user()->name}}</a></li>
                                                <ul class="submenu">
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="cart.html">Card</a></li>

                                                </ul>
                                            @endauth

                                            @guest

                                            @endguest


                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between padding-modify">

                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right " style="min-width: 250px;">
                                            <input type="text" name="Search" placeholder="Busque produtos">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                                        </div>
                                     </li>

                                    <li>
                                        <div class="favorit-items" style="--x:  {{Cart::count()}}">
                                            <a href="{{ route('carrinho.index') }}"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li><li>
                                        <div class="dropdown hide-button">
                                            @auth
                                                <button class="btn header-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" fon>
                                                {{Auth::user()->name}}
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>

                                              </div>
                                            @endauth
                                            @guest
                                                <li class="d-none d-lg-block"> <a href="{{ route('login') }}" class="btn header-btn">Login</a></li>
                                                <li class="d-none d-lg-block"> <a href="{{ route('register') }}" class="btn header-btn">Registro</a></li>
                                            @endguest
                                          </div>

                                    </li>

                                </ul>
                            </div>

                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>


    @yield('content')















    <footer>
		<!-- Footer Start-->
		<div class="footer-area footer-padding footer-color">
			<div class="container">
				<div class="row d-flex justify-content-between">

				</div>
				<div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div style="padding-top: 15px; ">
                            <img src="assets/img/logo/logo.png" alt="">
                        </div>

                    </div>
					<div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="footer-copy-right">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos direitos reservados | APJ
                        </div>


					</div>
					<div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>

		<!-- Footer End-->
	</footer>

     <!-- JS here -->

         <!-- All JS Custom Plugins Link Here here -->
         <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
         <!-- Jquery, Popper, Bootstrap -->
         <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
         <script src="./assets/js/popper.min.js"></script>
         <script src="./assets/js/bootstrap.min.js"></script>
         <!-- Jquery Mobile Menu -->
         <script src="./assets/js/jquery.slicknav.min.js"></script>

         <!-- Jquery Slick , Owl-Carousel Plugins -->
         <script src="./assets/js/owl.carousel.min.js"></script>
         <script src="./assets/js/slick.min.js"></script>

         <!-- One Page, Animated-HeadLin -->
         <script src="./assets/js/wow.min.js"></script>
         <script src="./assets/js/animated.headline.js"></script>
         <script src="./assets/js/jquery.magnific-popup.js"></script>

         <!-- Scrollup, nice-select, sticky -->
         <script src="./assets/js/jquery.scrollUp.min.js"></script>
         <script src="./assets/js/jquery.nice-select.min.js"></script>
         <script src="./assets/js/jquery.sticky.js"></script>

         <!-- contact js -->
         <script src="./assets/js/contact.js"></script>
         <script src="./assets/js/jquery.form.js"></script>
         <script src="./assets/js/jquery.validate.min.js"></script>
         <script src="./assets/js/mail-script.js"></script>
         <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

         <!-- Jquery Plugins, main Jquery -->
         <script src="./assets/js/plugins.js"></script>
         <script src="./assets/js/main.js"></script>

     </body>
 </html>
