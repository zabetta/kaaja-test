@extends('layouts.main')

@section('header')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('home')}}">
                <img class="img-responsive" src="{{URL::asset('/images/logo.png')}}" style="max-width:100px" />
            </a>
        </div>
    </div>
@stop


@section('content')  

    @if(!empty($errorMsg))
    <div class="alert alert-warning"> {{ $errorMsg }}</div>
    @endif

    @if(!empty($successMsg))
    <div class="alert alert-success"> {{ $successMsg }}</div>
    @endif

    <h1>Users List</h1>

    @if($users->isEmpty()))
        <p class="bg-danger text-white p-1">No user defined</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User name</th>
                <th scope="col">User email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user )
            <tr">
                <th scope="row"> - </th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <a href="{{ url('/') }}" >
        <button type="back" class="btn btn-primary" style="margin-top: 0.5em;">BACK</button>
    </a>
@stop
