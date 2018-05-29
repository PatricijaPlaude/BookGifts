<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        foreach ($books as $key => $value) {
           $books[$key]->genre = Genre::findOrFail($books[$key]->genre)->name;
        }
        return view('home', ['books' => $books]);
    }
}
