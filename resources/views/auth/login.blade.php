@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/auth/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/style.css') }}" rel='stylesheet' type='text/css' media="all">
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
@endpush
@section('content')
    <h1 class="error">Gadget Sign Up Form</h1>
    <!---728x90--->
    <div class="w3layouts-two-grids">
        <!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">
                <h3>Manage Your Gadgets Account</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget Lorem ipsum
                    dolor sit
                    amet, consectetuer adipiscing elit. Aenean commodo ligula ege</p>
                <img src="{{ asset('images/b11.png') }}" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side">
                <h2> Вход </h2>
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                    </div>
                    <div class="form-left-to-w3l">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                    </div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="remenber-me">Запомнить меня</span>
                        </div>
                        <div class="right-side-forget">
                            <a href="{{ route('password.request') }}" class="for">Забыли пароль...?</a>
                        </div>
                    </div>
                    <div class="btnn">
                        <button type="submit" class="signUp">
                            Войти
                        </button>
                    </div>
                </form>
                <div class="login">
                    <a class="google" href="{{ route('google') }}"><i class="fab fa-google fa-2x"></i></a>
                    <a class="vk" href="#"><i class="fab fa-vk fa-2x"></i></a>
                    <a class="odnoklassniki" href="#"><i class="fab fa-odnoklassniki fa-2x"></i></a>
                    <a class="facebook" href="#"><i class="fab fa-facebook fa-2x"></i></a>
                </div>
                <div class="w3layouts_more-buttn">
                    <h3>Еще нет аккаунта..?
                            <a href="{{ route('register') }}">Зарегистрироваться</a>
                    </h3>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection
