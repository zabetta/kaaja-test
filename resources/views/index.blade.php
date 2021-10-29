@extends('layouts.main')

@section('content')
<!-- index content -->
    <div class="row">
        <div class="col-md-12">
            <img class="img-responsive" style="display:block; margin:auto;" src="{{URL::asset('/images/logo.png')}}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <a href="{{ route( 'user.book' ) }}">
            <button style="border-radius: 5px; height: 30px;" >Make a reservation</button>
        </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route( 'user.book.list' ) }}">
                <button style="border-radius: 5px; height: 30px;" >Show esisting reservation</button>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route( 'user.list' ) }}">
                <button style="border-radius: 5px; height: 30px;" >Show users list</button>
            </a>
        </div>
    </div>

@stop

