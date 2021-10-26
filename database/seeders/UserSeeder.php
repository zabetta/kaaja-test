<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        for ($i=0; $i < 100; $i++) { 
            $faker = \Faker\Factory::create();

            DB::table("users")->insert([
                "name" => $faker->name(),
                "email" => $faker->safeEmail,
                "email_verified_at" => $faker->date(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'group_id' => rand(2,4)
            ]);
        }
        
    }
}
