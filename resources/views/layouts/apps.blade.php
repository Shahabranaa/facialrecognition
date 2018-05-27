<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lost and Found Missing Persons</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
        body {
            padding-top: 4rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('index') }}">Lost and Found Missing Persons</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}">Home<span class="sr-only">(current)</span></a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create') }}">Submit a Report </a>
                    </li>
                        @endif
                </ul>

        <ul class="nav navbar-nav navbar-right" >
            <!-- Authentication Links -->
            @guest
                <li><a style="color: #e5e1ea" href="{{ route('login') }}">Login</a></li>
                <li><a style="color: #e5e5e5" href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a style="color: #e5e1ea" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a style="color: #e5e1ea" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>

    </div>
</nav>

<div class="container">
    @yield('content')

    <hr>

    <footer>
        Lost and Found Missing Persons
    </footer>
</div>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>