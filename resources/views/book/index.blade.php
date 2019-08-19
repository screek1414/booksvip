@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="search">
    <div class="input-group md-form form-sm form-2 pl-0">
        <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
                <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                                                                                  aria-hidden="true"></i>Поиск</span>
        </div>
    </div>
    </div>
    <div class="main">
        @foreach($books->allBooks() as $book)
            <div class="allInfo">
                <div class="information">
                    <div class="image">
                        <a href="/book/{{ $book->books_id }}"><img
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
                    </div>
                </div>
                <div class="buttons">
                    <div class="mainBtn moreDetails"><a class="button-1" href="/book/{{ $book->books_id }}">Подробней...</a></div>
                    @if ($book->checkLiked($book->like))
                        <div class="button-1 mainBtn addButton red" data-id="{{ $book->books_id }}" onclick="addLike(this)">Нравится {{ $book->likes }}</div>
                    @else
                        <div class="button-1 mainBtn addButton" data-id="{{ $book->books_id }}" onclick="addLike(this)">Нравится {{ $book->likes }}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    {{$books->allBooks()->links()}}
@endsection
