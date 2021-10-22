@extends('layouts.main')

@section('content')
<!-- index content -->
    <div class="row">
        <div class="col-md-12">
            <img class="img-responsive" src="{{URL::asset('/images/logo.png')}}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="{{ route( 'user.book' ) }}">
            <button style="border-radius: 5px; height: 30px;" >Prenota una classe</button>
        </a>
        </div>
    </div>

@stop

