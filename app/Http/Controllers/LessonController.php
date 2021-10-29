<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Lesson;
use App\Models\LessonsUser;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\ReservationCreated;
use App\Mail\LessonFull;

class LessonController extends Controller
{
    public function showReservationForm(){

        $users = User::all();        
        $lessons =  DB::table('lessons')
            ->select('description')
            ->where('start_time', '>', now())
            ->distinct()->get();

        $days =  DB::table('lessons')
            ->select('date')
            ->where('start_time', '>', now())
            ->distinct()->get();

        return view('reservation.form')
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

        if ($lesson->capacity == 0)
            return view('book', $data)->with('errorMsg','Class Selected has no availabilty.');

        $lessonUser = new LessonsUser();
        $lessonUser->user_id = $userId; 
        $lessonUser->lesson_id = $lesson->id; 
        $lessonUser->save();

        $lesson->capacity--;
        
        if ($lesson->save()){
            $user = User::findOrFail($userId);
            $lesson = Lesson::findOrFail($userId);
            
            // Send notice Lesson is full
            if ($lesson->capacity == 0){
                Mail::to($lesson->coach()->email)->send(new LessonFull($lesson));
            }       
                
            Mail::to($user->email)->send(new ReservationCreated($user, $lesson));
            return view('reservation.form', $data)->with('successMsg','Reservation Successfully created.');  
        }

        return view('reservation.form', $data)->with('errorMsg','Something goes wrong! please call us to grant you a lesson.');  
                
    }

    public function list(Request $request){

        $bookedLessons = LessonsUser::all();

        return view('reservation.list', ['bookedLessons' => $bookedLessons]);  
                
    }

    public function deleteReservation( Request $request ){

        $bookedLesson = LessonsUser::find( $request->input('id') );

        if (null === $bookedLesson)
            return view('reservation.list', ['bookedLessons' => LessonsUser::all()])->with('errorMsg','reservation can not be found');  
        
        $lesson = $bookedLesson->lesson()->first();

        $lesson->capacity++; 

        $allReservations = LessonsUser::all();

        if ($lesson->save()){
            if($bookedLesson->delete()){
                return view('reservation.list', ['bookedLessons' => $allReservations])->with('successMsg','Reservation has been deleted successfully and lesson capacity restoed.');  
            }   
            return view('reservation.list', ['bookedLessons' => $allReservations])->with('errorMsg','Probems with reservation deleted, please contact us');
        }
        return view('reservation.list', ['bookedLessons' => $allReservations])->with('errorMsg','Probems with class restore capacity, please contact us');        
                
    }

    
}
