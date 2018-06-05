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

                    {!! Form::open(['action' => 'OrderController@store', 'files' => true, 'class' => 'form-horizontal']) !!}
                    {!! Form::label('address', 'Destination address',['class'=>'form-label']) !!}
                    {!! Form::text('address', '', ['class' => 'form-control '.($errors->has('address') ? ' is-invalid' : '' )]) !!}   
                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif <br/>
                    {!! Form::label('phone', 'Phone number',['class'=>'form-label'])!!}
                    {!! Form::text('phone', '', ['class' => 'form-control '.($errors->has('phone') ? ' is-invalid' : '' )]) !!}
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif<br/>

                    {!! Form::hidden('book', $book->id) !!}   
                    {!! Form::submit(' Make an order ', ['class' => 'btn btn-primary']) !!}   
                    {!! Form::close() !!}      
        </div>
    </div>
</div>
@endsection
