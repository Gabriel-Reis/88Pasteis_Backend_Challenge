<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('88Pasteis', '88Pasteis') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        {{-- <script src="jquery.maskedinput.js" type="text/javascript"></script> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" integrity="sha256-u7MY6EG5ass8JhTuxBek18r5YG6pllB9zLqE4vZyTn4=" crossorigin="anonymous"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script> --}}

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style type="text/css">
        @yield('css')
    </style>

    <style>
/*    .main-section{
        background-color: #F8F8F8;
        margin-top:50px;
    }*/
/*    .cart-dropdown{
        float:right;
        padding-right: 30px;
    }*/
/*    .cart-btn{
        border:0px;
        margin:10px 0px;
        box-shadow:none !important; 
    }*/
/*    .cart-dropdown .cart-dropdown-menu{
        padding:20px !important;;
        top:30px !important;
        width:150px !important;
        left:-110px !important;
        box-shadow:0px 5px 30px black !important;;
    }*/
    /*.total-header-section{
        border-bottom:1px solid #d2d2d2;
    }*/
    .total-section p{
        margin-top:5px;
        margin-bottom:5px;
    }
    .cart-detail{
        padding:10px 0px;
    }
    .cart-detail-img img{
        width:100%;
        height:100%;
        padding-left:15px;
    }
   .cart-detail-product p{
        margin:0px;
        color:#000;
        font-weight:500;
    }
    .cart-detail .price{
        font-size:12px;
        margin-right:10px;
        font-weight:500;
        text-align: left;
    }
    .cart-detail .count{
        color:#C2C2DC;
        padding-right:0px;
    }
    .checkout{
        /*border-top:1px solid #d2d2d2;   */
        /*padding-top: 5px;*/
    }
    .checkout .btn-primary{
        border-radius:50px;
        height:50px;
    }
/*    .cart-dropdown-menu:before{
      content: " ";
      position:absolute;
      top:-20px;
      right:50px;
      border:10px solid transparent;
      border-bottom-color:#fff; 
    }
*/   .size-dropdown-menu {
        width:300px !important;
    }
    .cart-row-align-padding {
        padding-top: 15px;
        padding-left: 15px;
    }
</style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ asset('public/img/88pasteis_logo.png') }} --}}
                    <img src="{{ asset("logo.png") }}" alt="88Pastéis" width="30" height="30" class="d-inline-block align-text-top">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pasteis.index') }}">Cardápio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Link </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">TESTELOGIN</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Link </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">




































                        <!-- Cart Dropdown-toggle -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarCartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="35" height="30">
                                    <polyline fill="none" points="2 1.7 5.5 1.7 9.6 18.3 21.2 18.3 24.6 6.1 7 6.1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2.5" style="stroke:white"></polyline>
                                    <circle cx="10.7" cy="23" r="2.2" stroke="none" fill="white"></circle>
                                    <circle cx="19.7" cy="23" r="2.2" stroke="none" fill="white"></circle>
                                    <circle cx="24" cy="8" r="8" stroke="none" fill="orange"></circle>
                                    <text x="20" y="13" fill="black">
                                        @php 
                                        if (session()->has('cart')) 
                                            echo count(session()->get('cart'));
                                        else
                                            echo 0;
                                        @endphp
                                    </text>
                                </svg>
                            </a>

                            <!-- Cart Dropdown content -->
                            <ul class="dropdown-menu size-dropdown-menu" aria-labelledby="navbarCartDropdown">

                                <!-- CONTENT HEADER -->
                                <div class="row cart-row-align-padding">
                                    <div class="col">
                                        <svg width="35" height="30">
                                            <polyline fill="none" points="2 1.7 5.5 1.7 9.6 18.3 21.2 18.3 24.6 6.1 7 6.1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2.5" style="stroke:black"></polyline>
                                            <circle cx="10.7" cy="23" r="2.2" stroke="none" fill="black"></circle>
                                            <circle cx="19.7" cy="23" r="2.2" stroke="none" fill="black"></circle>
                                            <circle cx="24" cy="8" r="8" stroke="none" fill="orange"></circle>
                                            <text x="20" y="13" fill="black">
                                                @php 
                                                if (session()->has('cart')) 
                                                    echo count(session()->get('cart'));
                                                else
                                                    echo 0;
                                                @endphp
                                            </text>
                                        </svg>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info">$2,978.24</span></p>
                                    </div>
                                </div>
                                <hr>

                                <!-- CONTENT ITENS -->
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="/images/pasteis/calabresa.jpg">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>Pastel de calabresa</p>
                                        <span class="price text-info"> R$100.22</span> <span class="count"> Qnt.: 01</span>
                                    </div>
                                </div>
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="/images/pasteis/carne_seca.jpg">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>Pastel de carne seca</p>
                                        <span class="price text-info"> R$50.40</span> <span class="count"> Qnt.: 01</span>
                                    </div>
                                </div>
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="/images/pasteis/nutella.jpg">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>Pastel de Nutella</p>
                                        <span class="price text-info"> R$10.00</span> <span class="count"> Qnt.: 01</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col text-center checkout">
                                        <button class="btn btn-primary btn-block">Checkout</button>
                                    </div>
                                </div>
                            </ul>
                        </li>






















































                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }} </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @endguest
                </ul>
        </div> <!-- END CONTAINER -->
    </nav> <!-- END NAVBAR -->
</div> <!-- END DIV APP -->

<main class="py-4 container">
    @yield('content')
</main>
</div>

@yield('scripts')

</body>
</html>
