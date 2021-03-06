@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                        <p>
                            {{ $res->response[0]->title }}
                            {{ $res->response[1]->title }}
                            {{ $res->response[2]->title }}
                            {{ $res->response[3]->title }}
                            {{ $res->response[4]->title }}
                            {{ $res->response[5]->title }}
                        </p>
                </div>
            </div>
            <a href="{{ route('verification.notice') }}">Подтверждение почты</a><br>
            {{ md5('qweqwe') }}
            <br>
            {{ md5('qweqwe') }}
        </div>
    </div>
</div>
@endsection
