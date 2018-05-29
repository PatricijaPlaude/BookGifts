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
                        <p>Language: {{$book->lang}} </p>
                        <p class="no-decor"> 
                        {{$book->description}}
                        </p>
                        <p>Seller: {{$book->owner}}</p>
                        @if ($book->ownerid != Auth::User()->id)
                    <a id="addBook" href="{{url('order/add')}}/{{$book->id}}">Order</a>
                    @else
                    <a id="addBook" href="{{url('book/remove')}}/{{$book->id}}">Remove</a>
                    @endif
        </div>
    </div>
</div>
@endsection
