<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            'topic 1',
            'topic 2',
            'topic 3',
            'topic 4',
            'topic 5',
            'topic 6',
            'topic 7',
            'topic 8',
            'topic 9'
        ];
        for($i = 0; $i < count($topics); $i++)
        {
            \App\Models\Topic::insert([
                'subject_id' => rand(1, 21),
                'topic' => $topics[$i]
            ]);
        }
    }
}
