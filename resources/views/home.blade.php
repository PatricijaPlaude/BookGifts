@extends('layouts.app', ['title'=>'BookGifts'])
@section('content')
<div class="container">
        <table class="fit"><?php $i=0; ?>
        <tr>
            <td><h3>The list of books</h3> </td>
            <td><h3><a class="addBtn" href="{{url('book/add')}}">Add new book</a></h3></td>
        </tr>
                    @foreach ($books as $book)
                    <?php $i++; ?>
                @if ($i%2==1)
                <tr>
                @endif
                <td>
                    <div class="card"><a href="{{ url('book', $book['id']) }}" >
                        <div class="card-body">
                        <h5 class="card-title">
                            {{ $book->name }} ({{$book->year}})
                        </h5>
                        <p>{{$book->genre}} by {{ $book->author }}</p>
                        <p class="no-decor"> 
                        @if (mb_strlen($book->description) < 100) 
                        {{$book->description}}
                        @else 
                        {{ mb_substr($book->description,0,mb_strpos($book->description,' ',100))}}...
                        @endif
                        </p>
                        </div></a>
                    </div>
                </td>
                @if ($i%2==0)
                </tr>
                @endif
                @endforeach
        </table>
</div>
@endsection
