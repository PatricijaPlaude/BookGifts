@extends('layouts.app', ['title'=>'Users'])
@section('content')
<div class="container">
        <table><?php $i=0; ?>
        <tr>
            <td><h3>The list of users</h3> </td>
        </tr></table>
        <div class="card">
            <div class="card-body">
                <table class="fit">
                    <tr><th>№</th><th>E-mail</th><th>Username</th><th>Role</th></tr>
                    @foreach ($users as $user)
                    <?php $i++; ?>
                    <tr><td>{{$i}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}} 
                            @if ($user->id != Auth::user()->id)
                            <a class="addBtn" href="{{ url('/user/update') }}/{{$user->id}}">Change</a> 
                        @endif
                    </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
@endsection
