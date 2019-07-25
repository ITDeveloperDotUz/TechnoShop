<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('webfonts/font.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('webfonts/all.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/neu.css') }}" rel="stylesheet">
    @yield('headers')
</head>
<body>
@php(
$uri = Route::current()->getName()
)
    <div id="app" class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-dark active">
            <div class="sidebar-content">
                <div class="sidebar-header">
                    <h3><a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }} - Credit Store
                        </a></h3>
                    <strong>TS</strong>
                </div>
                <ul class="list-unstyled components">
                    <li class="{{ $uri == 'clients.index' ? 'active' : '' }}">
                        <a href="#ClientsSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <strong class="sidebar-full"> Мижозлар </strong>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="ClientsSubmenu">
                            <li>
                                <a href="{{ route('clients.create') }}"><i class="fa fa-plus"></i> Янги мижоз</a>
                                <a href="{{ route('clients.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ $uri == 'categories.index' ? 'active' : '' }}">
                        <a href="#CategoriesSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                            <strong class="sidebar-full"> Булимлар </strong>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="CategoriesSubmenu">
                            <li>
                                <a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i> Янги Булим</a>
                                <a href="{{ route('categories.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ $uri == 'products.index' ? 'active' : '' }}">
                        <a href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-box"></i>
                            <strong class="sidebar-full"> Махсулотлар </strong>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="productsSubmenu">
                            <li>
                                <a href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Янги Махсулот</a>
                                <a href="{{ route('products.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ $uri == 'product_incomes.index' ? 'active' : '' }}">
                        <a href="#prodInSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                            <strong class="sidebar-full"> Киримлар </strong>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="prodInSubmenu">
                            <li>
                                <a href="{{ route('product_incomes.create') }}"><i class="fa fa-plus"></i> Янги Кирим</a>
                                <a href="{{ route('product_incomes.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ $uri == 'orders.index' ? 'active' : '' }}">
                        <a href="#ordersSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i>
                            <strong class="sidebar-full"> Буюртмалар </strong>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="ordersSubmenu">
                            <li>
                                <a href="{{ route('orders.create') }}"><i class="fa fa-plus"></i> Янги Буюртма</a>
                                <a href="{{ route('orders.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ $uri == 'payments.index' ? 'active' : '' }}">
                        <a href="#paymentsSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-money-check"></i>
                            <strong class="sidebar-full"> Туловлар </strong>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="paymentsSubmenu">
                            <li>
                                <a href="{{ route('payments.index') }}"><i class="fa fa-bars"></i> Ройхат</a>
                            </li>
                            <li>
                                <a href="{{ url('/payments/get/daily') }}"><i class="fa fa-bars"></i> Бугнги туловлар</a>
                            </li>
                            <li>
                                <a href="{{ url('/payments/get/expired') }}"><i class="fa fa-bars"></i> Туланмаган</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="mb-3 bg-white navbar navbar-expand-lg">
                <div class="container-fluid navbar-laravel">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="float-right navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
                <div class="container-fluid align-center">


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @if(count($errors))
                <div class="container-fluid mb-3">
                    <div class="card alert alert-danger">
                        <h4>{{ count($errors) }} та хато мавжуд</h4>
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <p class="text-danger "><b>{{ $error }}</b></p>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="container-fluid mb-3">
                    <div class="card alert alert-success">
                        <h4>Бажарилди!</h4>
                        <ul class="list-group">
                            <p class="text-success"><b><i class="fa fa-check"></i> {{ Session::get('success') }}</b></p>
                        </ul>
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
