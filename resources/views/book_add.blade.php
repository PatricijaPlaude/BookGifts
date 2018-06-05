@extends('layouts.app', ['title'=>'New book'])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
                    {!! Form::open(['action' => 'BookController@store', 'files' => true, 'class' => 'form-horizontal']) !!}
                    {!! Form::label('name', 'Name of the book',['class'=>'form-label']) !!}
                    {!! Form::text('name', '', ['class' => 'form-control '.($errors->has('name') ? ' is-invalid' : '' )]) !!}   
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif <br/>
                    {!! Form::label('author', 'Author',['class'=>'form-label'])!!}
                    {!! Form::text('author', '', ['class' => 'form-control '.($errors->has('author') ? ' is-invalid' : '' )]) !!}   
                    @if ($errors->has('author'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('author') }}</strong>
                        </span>
                    @endif <br/>
                    {!! Form::label('year', 'Publication year',['class'=>'form-label'])!!}
                    {!! Form::number('year', '', ['class' => 'form-control '.($errors->has('year') ? ' is-invalid' : '' ), 'step' => '1', 'min' => 0, 'max' => date("Y")]) !!}
                    @if ($errors->has('year'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif<br/>
                    {!! Form::label('genre', 'Genre',['class'=>'form-label'])!!}
                    {!! Form::select('genre', $genres, '', ['class' => 'form-control '.($errors->has('genre') ? ' is-invalid' : '' )]) !!}
                    @if ($errors->has('genre'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('genre') }}</strong>
                        </span>
                    @endif <br/>
                    {!! Form::label('price', 'Price',['class'=>'form-label'])!!}
                    {!! Form::number('price', '', ['class' => 'form-control '.($errors->has('price') ? ' is-invalid' : '' ), 'step' => '0.1', 'min' => 0, 'max' => 100]) !!}
                    @if ($errors->has('price'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif <br/>
                    {!! Form::label('description', 'Description',['class'=>'form-label'])!!}
                    {!! Form::textArea('description', '', ['class' => 'form-control '.($errors->has('description') ? ' is-invalid' : '' )]) !!}                     
                    @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    <br/>                  
                    <div class="center">
                    {!! Form::submit(' Upload ', ['class' => 'addBtn']) !!}</div>   
                    {!! Form::close() !!}                    
        </div>
    </div>
</div>
@endsection
