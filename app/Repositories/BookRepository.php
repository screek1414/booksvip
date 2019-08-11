<?php

namespace App\Repositories;

use App\Book;

/**
 * Class BookRepository
 * @package App\Repositories
 */
class BookRepository
{
    /**
     * @return mixed
     */
    public function allBooks()
    {
        return Book::orderBy('books_id', 'asc')
            ->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function book($id)
    {
        return Book::where('books_id', $id)->first();
    }

    /**
     * @param $bookId
     */
    public function updateLikeIncrement($bookId)
    {
        Book::where('books_id', $bookId)
            ->increment('likes');
    }

    /**
     * @param $bookId
     */
    public function updateLikeDecrement($bookId)
    {
        Book::where('books_id', $bookId)
            ->decrement('likes');
    }


}
