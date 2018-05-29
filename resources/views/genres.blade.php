@extends('layouts.app', ['title' => 'Genres'])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <ol>
             @foreach ($genres as $genre)
             <li>{{$genre->name}}</li>
                @endforeach
            
            <li>  {!! Form::open(['action' => 'GenreController@store', 'files' => true, 'class' => 'form-horizontal']) !!}
                    {!! Form::text('name', '', ['class' => 'form-control '.($errors->has('name') ? ' is-invalid' : '' )]) !!}   
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif 
                {!! Form::submit(' Add new ', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}  
            </li>
            </ol>
                
        </div>
    </div>
</div>
@endsection
