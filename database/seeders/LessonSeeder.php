<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create Fake lessons in the next 10 days

        $today = CarbonImmutable::today();
    
        for ($i=1; $i < 10 ; $i++) { 
         
            $faker = \Faker\Factory::create();
            $coaches = DB::table('users')->inRandomOrder()->where('group_id',3)->limit(6)->get();

            $nextDay = $today->addDays( $i );            
            
            DB::table('lessons')->insert([
                'description' => 'Morning Lesson',
                'coach' => $coaches[0]->id,
                'date' => $nextDay,
                'capacity' => 20,
                'start_time' => $nextDay->addHours(7),
                'end_time' => $nextDay->addHours(8)   
            ]);

                        
            $firstAfternoonLessonTime = $nextDay->addHours(4);
            DB::table('lessons')->insert([
                'description' => 'MidDay Lesson',
                'coach' => $coaches[1]->id,
                'date' => $nextDay,
                'capacity' => 20,
                'start_time' => $nextDay->addHours(12),
                'end_time' => $nextDay->addHours(13)   
            ]);


            $secondAfternoonLessonTime = $nextDay->addHours(1);
            DB::table('lessons')->insert([
                'description' => 'Lesson 4 pm',
                'coach' => $coaches[2]->id,
                'date' => $nextDay,
                'capacity' => 20,
                'start_time' => $nextDay->addHours(16),
                'end_time' => $nextDay->addHours(17)
            ]);
            
            $thirdAfternoonLessonTime = $nextDay->addHours(1);
            DB::table('lessons')->insert([
                'description' => 'Lesson 5 pm',
                'coach' => $coaches[3]->id,
                'date' => $nextDay,
                'capacity' => 20,
                'start_time' => $nextDay->addHours(17),
                'end_time' => $nextDay->addHours(18)
            ]);
            
            $lastLessonTime = $nextDay->addHours(1);
            DB::table('lessons')->insert([
                'description' => 'Lesson 6 pm',
                'coach' => $coaches[4]->id,
                'date' => $nextDay,
                'capacity' => 20,
                'start_time' => $nextDay->addHours(18),
                'end_time' => $nextDay->addHours(19)
            ]);
             
            DB::table('lessons')->insert([
                'description' => 'Lesson 7 pm',
                'coach' => $coaches[5]->id,
                'date' => $nextDay,
                'capacity' => 20,
                'start_time' => $nextDay->addHours(19),
                'end_time' => $nextDay->addHours(20)
            ]);
        }
    }
}
