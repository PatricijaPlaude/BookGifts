<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        $books = Book::where('owner','=',Auth::User()->id)->get();
        
        foreach ($books as $key => $value) {
           $books[$key]->genre = Genre::findOrFail($books[$key]->genre)->name;
        $ord = Order::where('book','=',$books[$key]->id)->get();
        if (isset($ord[0]->id)) 
            {
                $books[$key]->ordered = 1;
                $books[$key]->orderid = $ord[0]->id;
            }
        }
        return view('mybooks', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book_add', array('genres' => Genre::all()->sortBy('name')->pluck('name','id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = $rules = array(
            'name' => 'required|min:1|max:100',
            'author' => 'required|min:1|max:100',
            'year' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'genre' => 'required|exists:genres,id',
            'description' => 'required|min:20|max:500',      
        );
        $this->validate($request, $rules);   
        $book = new Book();
        $book->name = $data['name']; 
        $book->author = $data['author']; 
        $book->year = $data['year']; 
        $book->price = $data['price']; 
        $book->genre = $data['genre']; 
        $book->description = $data['description']; 
        $book->owner = Auth::User()->id; 
        $book->save();
        return redirect('/mybooks');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $req = Book::findOrFail($id);
        $req->genre = Genre::findOrFail($req->genre)->name;
        $req->ownerid=$req->owner;
        $req->owner = User::findOrFail($req->owner)->name;
        
        $ord = Order::where('book','=',$id)->get();
        if (isset($ord[0]->status)) 
        {
            $req->ordered = 1;
            $req->orderid=$ord[0]->id;
            $req->orderer=$ord[0]->buyer;
            $req->status=$ord[0]->status;
        }
        return view("book_show", ['book' => $req]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $req = Book::findOrFail($id);
        if ($req->owner != Auth::User()->id && !Auth::User()->isAdmin()) 
            return redirect('book/'.$id);
        $req = Order::where('book','=',$id)->get();
        $i=0;
        foreach ($req as $key => $value) {
            $i++;
        }
        if ($i==0) 
        {
            Book::where('id', '=', $id)->delete();
            return redirect('/mybooks');
        }
        else return redirect('book/'.$id);
    }
}
