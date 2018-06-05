<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $orders = Order::where('buyer','=',Auth::User()->id)->get();
        
        foreach ($orders as $key => $value) {
           $req = Book::findOrFail($orders[$key]->book);
           $orders[$key]->bookname = $req->name;
           $orders[$key]->price = $req->price;
        }
        return view('myorders', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $req = Book::findOrFail($id);
        $ord = Order::where('book','=',$id)->get();
        if (isset($ord[0]->status) || $req->owner==Auth::user()->id) return redirect('/book/'.$id);
        $req->genre = Genre::findOrFail($req->genre)->name;
        $req->ownerid=$req->owner;
        $req->owner = User::findOrFail($req->owner)->name;
        return view('/order_add',['book'=>$req]);
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
            'address' => 'required|min:1|max:100',
            'phone' => 'required|numeric|min:0',   
        );
        $this->validate($request, $rules);   
        $ord = Order::where('book','=',$data['book'])->get();
        if (isset($ord[0]->status)) return redirect('/book/'.$id);
        $order = new Order();
        $order->address = $data['address']; 
        $order->phone = $data['phone']; 
        $order->book = $data['book']; 
        $order->buyer = Auth::User()->id; 
        $order->save();
        return redirect('/myorders');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ord = Order::findOrFail($id);
        $req = Book::findOrFail($ord->book);
        if ($ord->buyer != Auth::User()->id && $req->owner!=Auth::User()->id)
            return redirect('/');
        $req->genre = Genre::findOrFail($req->genre)->name;
        $req->ownerid=$req->owner;
        $req->ownerid=$req->owner;
        $ord->buyerid=$ord->buyer;
        $req->owner = User::findOrFail($req->owner)->name;
        $ord->buyer = User::findOrFail($ord->buyer)->name;
        return view("order_show", ['book' => $req, 'order' => $ord]);
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
    public function update($id)
    {
        $ord = Order::findOrFail($id);    
        $book = Book::where('id','=',$ord->book)->get();
        $this->destroy($id);
        return redirect('book/remove/'.$book[0]->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ord = Order::findOrFail($id);
        $book = Book::where('id','=',$ord->book)->get();
        if ($ord->buyer != Auth::User()->id && $book[0]->owner!=Auth::User()->id)
            return redirect('/');

        Order::where('id', '=', $id)->delete();
        return redirect('/book/'.$book[0]->id);
    }
}
