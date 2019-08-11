<?php

namespace App\Http\Controllers;

use App\Book;
use App\Repositories\BookRepository;
use App\Repositories\LikeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    /**
     * @var LikeRepository
     */
    protected $likeRepository;

    /**
     * @var BookRepository
     */
    protected $bookRepository;

    /**
     * LikeController constructor.
     * @param LikeRepository $likeRepository
     * @param BookRepository $bookRepository
     */
    public function __construct(
        LikeRepository $likeRepository,
        BookRepository $bookRepository
    ) {
        $this->likeRepository = $likeRepository;
        $this->bookRepository = $bookRepository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function like(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if (true) {
            $bookRequest = json_decode($request->getContent());
            $bookId = $bookRequest->book_id;
            if ($this->likeRepository->checkLike($bookId)) {
                $this->likeRepository->deleteLike($bookId);
                $this->bookRepository->updateLikeDecrement($bookId);
            } else {
                $this->likeRepository->addLike($bookId);
                $this->bookRepository->updateLikeIncrement($bookId);
            }
        }
    }
}
