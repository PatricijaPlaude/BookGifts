<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Order;
use Cookie;
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
        $lang = Cookie::get('lang');
        $books = Book::all();
        $i=0;
        foreach ($books as $key => $value) {
            $i++;
           $books[$key]->genre = Genre::findOrFail($books[$key]->genre)->name;
           $req = Order::where('book','=',$books[$key]->id)->get();
           if (isset($req[0]->status)) unset($books[$key]);
           if ($lang == $books[$key]->lang)
           {
                $j=0;
                while($j!=$i && $books[$j]->lang==$lang) $j++;
                if ($j!=$i)
                {
                    $temp = $books[$j];
                    $books[$j] = $books[$key];
                    $books[$key]=$temp; 
                }
           }
        }
        return view('home', ['books' => $books]);
    }
}
