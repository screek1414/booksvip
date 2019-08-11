<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Repositories\LikeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $likeRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LikeRepository $likeRepository)
    {
        $this->middleware(['auth', 'verified']);
        $this->likeRepository = $likeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('lc.cabinet', [
            'books' => $this->likeRepository,
            'user' => Auth::id(),
        ]);
    }


}
