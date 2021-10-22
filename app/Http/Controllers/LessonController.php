<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function showBookForm(){

        $users = User::all();
        $lessons = Lesson::all();

        return view('book')->with('users', $users)->with('lessons', $lessons);


    }
    
    public function saveUserBooking(Request $request){
        dd( $request );
    }
}
