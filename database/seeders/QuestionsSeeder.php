<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $user_id = \App\Models\User::pluck('id');
        $subject_id = \App\Models\Subject::pluck('id');
        $level_id = \App\Models\Level::pluck('id');
        foreach(range(1,50) as $index)
        {
            \App\Models\Question::insert([
                'content' => Str::random(30),
                'A' => Str::random(5),
                'B' => Str::random(5),
                'C' => Str::random(5),
                'D' => Str::random(5),
                'answer' => $faker->randomElement(['A', 'B', 'C', 'D']),
                'user_id' => $faker->randomElement($user_id),
                'subject_id' => $faker->randomElement($subject_id),
                'level_id' => $faker->randomElement($level_id)

            ]);
        }
    }
}
