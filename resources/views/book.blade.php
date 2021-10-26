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

    @if(!empty($successMsg))
    <div class="alert alert-success"> {{ $successMsg }}</div>
    @endif

    @if(!empty($errorMsg))
    <div class="alert alert-error"> {{ $errorMsg }}</div>
    @endif

    <form method="POST" action="/book">
        @csrf
        <div class="row">
            <div class="col-md-8">
                User
            </div>
            <div class="col-md-4">
                <select name="user" id="user-select">
                    <option value="">select any user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                Day
            </div>
            <div class="col-md-4">
                <select name="date" id="date-select">
                    {{$lessons}}
                    <option value="">select a date</option>
                    @foreach($dates as $date)
                        <option value="{{ $date->date }}">{{ $date->date }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                Lesson
            </div>
            <div class="col-md-4">
                <select name="lesson" id="lesson-select">
                    {{$lessons}}
                    <option value="">select a lesson</option>
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->description }}">{{ $lesson->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="submit" value="Book your class">
        
    </form>   

@stop

