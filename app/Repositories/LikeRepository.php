<?php


namespace App\Repositories;

use App\Like;
use Illuminate\Support\Facades\Auth;

/**
 * Class LikeRepository
 * @package App\Repositories
 */
class LikeRepository
{
    /**
     * @param $bookId
     * @return bool
     */
    public function checkLike($bookId)
    {
        return Like::where([
            ['user_id', '=', Auth::id()],
            ['book_id', '=', $bookId]
        ])->first()
            ? true
            : false;
    }

    /**
     * @param $bookId
     */
    public function deleteLike($bookId)
    {
        Like::where([
            ['user_id', '=', Auth::id()],
            ['book_id', '=', $bookId]
        ])->delete();
    }

    /**
     * @param $bookId
     */
    public function addLike($bookId)
    {
        Like::insert(
            ['user_id' => Auth::id(), 'book_id' => $bookId]
        );
    }

    /**
     * @return mixed
     */
    public function userLikeBooks()
    {
        return Like::where('user_id', Auth::id())
            ->join('book_base', 'book_id', 'books_id')
            ->paginate(10);
    }
}
