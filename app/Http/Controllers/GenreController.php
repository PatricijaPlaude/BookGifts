<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'name' => 'required|min:3|max:100|unique:genres',
        );
        $this->validate($request, $rules);
        
        $genre = new Genre();
        $genre->name = $data['name'];
        $genre->save();
        return redirect('/genres');
    }
}
