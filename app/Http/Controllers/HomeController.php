<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Order;
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
        $i=0;
        foreach ($books as $key => $value) {
            $i++;
           $books[$key]->genre = Genre::findOrFail($books[$key]->genre)->name;
           $req = Order::where('book','=',$books[$key]->id)->get();
           if (isset($req[0]->id)) unset($books[$key]);
        }
        return view('home', ['books' => $books]);
    }
}
