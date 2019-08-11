<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Repositories\LikeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /*** @var BookRepository */
    protected $booksRepository;

    /*** @var LikeRepository */
    protected $likeRepository;

    /**
     * BookController constructor.
     * @param BookRepository $booksRepository
     * @param LikeRepository $likeRepository
     */
    public function __construct(
        BookRepository $booksRepository,
        LikeRepository $likeRepository
    ) {
        $this->booksRepository = $booksRepository;
        $this->likeRepository = $likeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('book.index', [
            'books' => $this->booksRepository,
            'user' => Auth::id(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Request $request)
    {
        $book = (object)$this->booksRepository->book($request->id);

        return view('book.single', [
            'book' => $book,
            'title' => $book->Title_name,
        ]);
    }

}
