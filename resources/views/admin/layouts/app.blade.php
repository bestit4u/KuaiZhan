<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="link-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Data Admin Page</title>
    <link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon">
    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/H-ui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/H-ui.admin.css')}}" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="{{asset('font/font-awesome.min.css')}}"/>
</head>
<body >
    <div id="app" ng-controller="menubarCtrl">
        <nav class="navbar navbar-default navbar-static-top Hui-header">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/admin') }}" style="color: #fff">
                        Data Admin Page
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li><a href="{{ route('admin.login') }}">관리자로그인</a></li>
                            <li><a href="{{ route('admin.register') }}">관리자등록</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#fff">
                                    {{ Auth::user()->admin_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="">
                                        @lang('auth.logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            <!-- {{ csrf_field() }} -->
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="cl Hui-main">
        @yield('menubar')
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/angular.js') }}"></script>   
    <script src="{{ asset('js/menubar.controller.js') }}"></script>
</body>
</html>
