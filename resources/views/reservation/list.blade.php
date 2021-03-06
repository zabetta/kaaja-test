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

    
    
    <h1>Reservation List</h1>



    @if($bookedLessons->isEmpty())
    
        <p class="bg-danger text-white p-1">No product</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Client Name</th>
                <th scope="col">BookedLesson</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookedLessons as $bookedLesson )
            <tr class="btnDelete" data-id="{{$bookedLesson->id}}">
                <th scope="row"> - </th>
                <td>{{$bookedLesson->user()->first()->name}}</td>
                <td>{{$bookedLesson->lesson()->first()->description}}</td>
                <td>
                    <form action="{{ route('book.delete', ['id' => $bookedLesson->id]) }}" method="post">
                        <input class="btn btn-delete" type="submit" value="Delete" style="background-color:#EFEFEF" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <a href="{{ url('/') }}" >
        <button type="back" class="btn btn-primary" style="margin-top: 0.5em;">BACK</button>
    </a>
@stop
