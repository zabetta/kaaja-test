<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Lesson;
use App\Models\LessonsUser;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function showBookForm(){

        $users = User::all();        
        $lessons =  DB::table('lessons')->select('description')->distinct()->get();
        $days =  DB::table('lessons')->select('date')->distinct()->get();

        return view('book')
            ->with('users', $users)
            ->with('lessons', $lessons)
            ->with('days', $days);

    }
    
    public function saveUserBooking(Request $request){

        $data = [
            'users' => User::all(),
            'lessons' =>  DB::table('lessons')->select('description', 'capacity')->distinct()->get(),
            'days' =>  DB::table('lessons')->select('date')->distinct()->get(),
        ];        

        $userId = $request->input('user');
        $lessonDesciption = $request->input('lesson');
        $date = $request->input('day');
        
        $lesson = Lesson::where('description', $lessonDesciption)->where('date', $date)->first();

        if ($lesson->capacity < 0){

            $lessonUser = new LessonsUser();
            $lessonUser->user_id = $userId; 
            $lessonUser->lesson_id = $lesson->id; 
            $lessonUser->save();

            $lesson->capacity--;

            if ($lesson->capacity == 0){
                // email admin classe completa
            }
            $lesson->save();

            return view('book', $data)->with('successMsg','Class Successfully created.');
        }else{
            return view('book', $data)->with('errorMsg','Class has no availabilty.');
        }
        
    }
}
