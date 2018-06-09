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
                        <p>Buyer: {{$order->buyer}}</p>
                        <p>Destination address: {{$order->address}}</p>
                        <p>Buyer's phone number: {{$order->phone}}</p>

                                @if ($order->buyerid != Auth::User()->id)
                                    <a class="addBtn" href="{{url('order/update')}}/{{$order->id}}">Delivered</a>
                                @else
                                    <a class="addBtn" href="{{url('order/remove')}}/{{$order->id}}">Decline</a>
                                @endif
        </div>
    </div>
</div>
@endsection
