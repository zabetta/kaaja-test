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
                'name' => 'Morning Lesson',
                'start' => $nextDay->addHours(6),
                'end' => $nextDay->addHours(7),
                'user_id' => $coaches[0]->id
            ]);

            
            $firstAfternoonLessonTime = $nextDay->addHours(4);
            DB::table('lessons')->insert([
                'name' => 'MidDay Lesson',
                'start' => $nextDay->addHours(12),
                'end' => $nextDay->addHours(13),
                'user_id' => $coaches[1]->id
            ]);


            $secondAfternoonLessonTime = $nextDay->addHours(1);
            DB::table('lessons')->insert([
                'name' => 'Lesson 4 pm',
                'start' => $nextDay->addHours(16),
                'end' => $nextDay->addHours(17),
                'user_id' => $coaches[2]->id
            ]);
            
            $thirdAfternoonLessonTime = $nextDay->addHours(1);
            DB::table('lessons')->insert([
                'name' => 'Lesson 5 pm',
                'start' => $nextDay->addHours(17),
                'end' => $nextDay->addHours(18),
                'user_id' => $coaches[3]->id
            ]);
            
            $lastLessonTime = $nextDay->addHours(1);
            DB::table('lessons')->insert([
                'name' => 'Lesson 6 pm',
                'start' => $nextDay->addHours(18),
                'end' => $nextDay->addHours(19),
                'user_id' => $coaches[4]->id
            ]);
             
            DB::table('lessons')->insert([
                'name' => 'Lesson 7 pm',
                'start' => $nextDay->addHours(19),
                'end' => $nextDay->addHours(20),
                'user_id' => $coaches[5]->id
            ]);

        }
    }
}
