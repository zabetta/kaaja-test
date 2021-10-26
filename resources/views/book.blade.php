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

    
    
    <form method="POST" action="/book">
        @csrf
        <div class="row">
            <div class="mb-4">
                <label for="user" class="form-label">User</label>
                <select class="form-select" name="user" id="user-select"  aria-label="Default select">
                @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>           
            </div>
            <div class="mb-4">
                <label for="day" class="form-label">Day</label>
                <select class="form-select" name="day" id="day-select"  aria-label="Default select">
                    @foreach($days as $day)
                        <option value="{{ $day->date }}">{{ $day->date }}</option>
                    @endforeach
                </select>           
            </div>
            <div class="mb-4">
                <label for="lesson" class="form-label">Lesson</label>
                <select class="form-select" name="lesson" id="lesson-select"  aria-label="Default select">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->description }}">{{ $lesson->description }}</option>
                    @endforeach
                </select>           
            </div>
        </div>        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
  

@stop

