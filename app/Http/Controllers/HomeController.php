<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.vk.com/method/database.getCountriesById?country_ids=1,4,34,54,65,76,87,92code=RU&access_token=8833418588334185883341852c885f09388883388334185d5609e28a9371b8e9e790594&v=5.101');
        $res = $response->getBody()->getContents();
        $res = json_decode($res);
//        dd($res);
        return view('home', [
            'res' => $res,
        ]);
    }
}
