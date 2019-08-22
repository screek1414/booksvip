<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @stack('styles')
    <link href="{{ asset('/public/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('/public/css/media.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="header">
        {{--        logo--}}
        <div class="header-logo">
            <a class="  " href="{{ url('/') }}">
                {{ config('app.name', 'Books') }}
            </a>
        </div>
        {{--        menu--}}
        <div class="header-nav">
            <a class="header-link" href="/books">Books</a>
            @guest
                <a class="header-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="header-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="dropdown">
                    <button class="dropbtn">{{ Auth::user()->name }} <span class="caret"></span>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    {{--                <a id="name-link-drop" class="dropdown header-link-drop" href="#">--}}
                    {{--                    {{ Auth::user()->name }} <span class="caret"></span>--}}
                    {{--                </a>--}}
                    <div class="dropdown-content">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @if (Auth::user()->isAdmin == 1)
                            <a href="{{ route('admin') }}">Admin</a>
                        @endif
                    </div>
                </div>
            @endguest
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
    <footer>

    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/like.js') }}" defer></script>
</body>
</html>
