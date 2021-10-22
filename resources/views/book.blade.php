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
<!-- index content -->
    <div class="row">
        <div class="col-md-12" style="color:#fff">
            In questa pagina è possibile selezionare una lezione, tra quelle disponibili e prenotare per la classe
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            lezioni
        </div>
        <div class="col-md-4">
            <select name="lesson" id="lesson-select">
                <option value="">Scegli una lezione</option>
                @foreach($lessons as $lesson)
                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

@stop

