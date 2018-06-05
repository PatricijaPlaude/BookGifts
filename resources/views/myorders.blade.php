@extends('layouts.app', ['title'=>'My orders'])
@section('content')
<div class="container">
        <table><?php $i=0; ?>
        <tr>
            <td><h3>The list of my orders</h3> </td>
        </tr></table><table>
                    @foreach ($orders as $order)
                    <?php $i++; ?>
                <tr>
                <td>
                    <div class="card"><a href="{{ url('order', $order['id']) }}">
                        <div class="card-body">
                        <p class="price">{{$order->price}} €</p>
                        <h5 class="card-title">
                            {{ $order->bookname }} 
                        </h5>
                        <p>Address: {{ $order->address }}</p>
                        <p>Phone: {{ $order->phone }}</p>
                        </div></a>
                    </div>
                </td>
                </tr>
                @endforeach
        </table>
        @if ($i==0)
        <h4 class="center">You have not made any order</h4>
        @endif
</div>
@endsection
