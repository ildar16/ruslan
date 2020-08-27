<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();

        $mapped = $books->mapWithKeys(function ($item) {
            return [$item['seat_id'] => $item];
        });

        $layout = 'app';

        return view('home', compact('mapped', 'layout'));
    }
}
