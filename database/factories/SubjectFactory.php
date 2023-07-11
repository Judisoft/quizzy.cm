<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
            'Computer Science',


        ];
        for($i = 0; $i < count($subjects); $i++)
        {
            return [
                'title' => $subjects[$i]
            ];
        }
    }
}
