@extends('layouts.app', ['title'=>$book->name])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
                        <p class="price">{{$book->price}} €</p>
                        <h5 class="card-title">
                            {{ $book->name }} 
                        </h5><br/>
                        <p>Written by: {{ $book->author }}</p>
                        <p>Publication year: {{$book->year}}</p>
                        <p>Genre: {{$book->genre}} </p>
                        <p class="no-decor"> 
                        {{$book->description}}
                        </p>
                        <p>Seller: {{$book->owner}}</p>
                    @if (Auth::user())
                        @if ($book->ordered != 1)
                            @if (Auth::User()->isAdmin() || $book->ownerid == Auth::User()->id)
                                <a class="addBtn" href="{{url('book/remove')}}/{{$book->id}}">Remove</a>
                            @endif
                            @if ($book->ownerid != Auth::User()->id)
                                <a class="addBtn" href="{{url('order/add')}}/{{$book->id}}">Order</a>
                            @endif
                        @else
                            <p class="red">This book is ordered</p><br/><br/>
                        @endif
                    @endif
        </div>
    </div>
</div>
@endsection