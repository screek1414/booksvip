@extends ('layouts.app')
@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cabinet.css') }}" rel="stylesheet">
@endpush
@section('content')
    @foreach($books->userLikeBooks() as $book)
        <div class="likedBooks">
            <p>
                Жанр:{{ $book->main_category }}
            </p>
            <p>
                Название: {{ $book->title }}
            </p>
            <p>
                <a href="/book/{{ $book->books_id }}">Подробней...</a>
            </p>
        </div>
    @endforeach
@endsection
