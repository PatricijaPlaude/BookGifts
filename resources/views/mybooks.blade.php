@extends('layouts.app', ['title'=>'My books'])
@section('content')
<div class="container">
        <table><?php $i=0; ?>
        <tr>
            <td><h3>The list of my books</h3> </td>
            <td><h3><a id="addBook" href="{{url('book/add')}}">Add new book</a></h3></td>
        </tr></table><table>
                    @foreach ($books as $book)
                    <?php $i++; ?>
                <tr>
                <td>
                    <div class="card"><a href="{{ url('book', $book['id']) }}">
                        <div class="card-body">
                        <h5 class="card-title">
                            {{ $book->name }} ({{$book->year}})
                        </h5>
                        <p>{{$book->genre}} by {{ $book->author }}</p>
                        <p class="no-decor"> 
                        @if (mb_strlen($book->description) < 100) 
                        {{$book->description}}
                        @else 
                        {{ mb_substr($book->description,0,100)}}...
                        @endif
                        </p>
                        </div></a>
                    </div>
                </td>
                </tr>
                @endforeach
        </table>
        @if ($i==0)
        <h4 class="center">You have not added any book</h4>
        @endif
</div>
@endsection
