@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/singleBook.css') }}" rel="stylesheet">
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="main">
    <div class="allInfo">
        <div class="information">
            <div class="image">
                <a href="/book/{{ $book->id}}"><img
                        src="{{ $book->image }}" alt="No image"></a>
                <img src="" alt="">
            </div>

            <div class="annotation">
                <p>
                    <span>Название:</span> {{ $book->title }}
                </p>
                <p>
                    <span>Автор:</span> {{ $book->author }}
                </p>
                <p>
                    <span>Жанр:</span> {{ $book->main_category }}
                </p>
                <p>
                    <span>Стоимость:</span> {{ $book->litres_price }} р. в Лабиринте
                </p>
                <p>
                    <span>Описание:</span> {{ $book->annotation }}
                </p>
            </div>
        </div>
    </div>
    <div class="mainBtn moreDetails"><a class="button-1" href="{{ URL::previous() }}">Go Back</a></div>
</div>
@endsection
