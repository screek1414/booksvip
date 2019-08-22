@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/books.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="main">
{{--        {{ dd($books) }}--}}
        @foreach($books->allBooks() as $book)
            <div class="book">
                <div class="information">
                    <div class="image">
                        <a href="/book/{{ $book->books_id }}"><img
                                src="{{ $book->image }}" alt="No image"></a>
{{--                        <img src="" alt="">--}}
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
                        <div class="button-1 active" data-id="{{ $book->books_id }}" onclick="addLike(this)">Нравится {{ $book->likes }}</div>
                    @else
                        <div class="button-1" data-id="{{ $book->books_id }}" onclick="addLike(this)">Нравится {{ $book->likes }}</div>
                    @endif
                </div>
            </div>
        @endforeach
            <div class="paginate">
                {{$books->allBooks()->links()}}
            </div>
    </div>
@endsection
