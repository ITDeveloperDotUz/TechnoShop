@include('layouts.sidebar')

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
    <div id="app" class="wrapper">
        <!-- Sidebar  -->
        @if($uri = Route::current()->getName() == 'login')
            <?php $sidebar = false; ?>
        @else
            <?php $sidebar = true; ?>
            @yield('sidebar')
        @endif

        <!-- Page Content  -->
        <div id="content" class="sidebar-active">
            <nav class="mb-3 bg-primary navbar navbar-expand-lg">
                <div class="container-fluid">
                    @if($sidebar)
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fas fa-align-left"></i>
                        </button>
                    @endif

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
            <div class="p-5"></div>
        </div>
    </div>
</body>
</html>
