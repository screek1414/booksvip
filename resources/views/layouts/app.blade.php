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
{{--        search--}}
        <div class="header-search">
            <form class="form-inline ml-auto">
                <input class="header-search-input" type="text" placeholder="Search" aria-label="Search">
                <button href="#!" class="header-search-button" type="submit">Search</button>
            </form>
        </div>
{{--        menu--}}
        <div class="header-nav">
            <!-- Right Side Of Navbar -->
            <ul class="header-ul">
                <li class="header-li">
                    <a class="header-link" href="/books">Books</a>
                </li>
                <!-- Authentication Links -->
            @guest
                    <li class="nav-item">
                        <a class="header-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @if (Route::has('register'))
                        <li class="header-li">
                            <a class="header-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li id="navbarDropdown" class="header-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </li>
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
                @endguest
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/like.js') }}" defer></script>
</body>
</html>
