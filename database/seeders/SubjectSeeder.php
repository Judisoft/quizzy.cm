<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            'Accounting',
            'Biology',
            'Chemistry',
            'Commerce',
            'Economics',
            'English Language',
            'Literature in English',
            'Food and Nutrition',
            'French',
            'Special Bilingual Education French',
            'Geography',
            'Geology',
            'History',
            'Citizenship Education',
            'Human Biology',
            'Mathematics',
            'Additional Mathematics',
            'Physics',
            'Religious Studies',
            'Logic',
            'Computer Science'
        ];
        for($i = 0; $i < count($subjects); $i++)
        {
            \App\Models\Subject::insert([
                'title' => $subjects[$i]
            ]);
        }
    }
}
