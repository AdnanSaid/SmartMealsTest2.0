
@extends('layouts.app')

@section('content')

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Username</th>
        </tr>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-danger">Results not found.</td>
            </tr>
        @endif
    </table>
    </div>

@endsection



