<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use App\Models\Subject;
use App\Models\WeekQuestion;
use Auth;
use Carbon\Carbon;

class ChallengeQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'challenge:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generates challenge questions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $subjects = Subject::all();
        $last_week = Score::max('week_id');
        $current_week_id =  $last_week + 1;

        foreach($subjects as $subject) {
            switch($subject->title) {
                case 'Biology':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(40)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'Chemistry':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(25)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'Physics':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(25)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'French':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(5)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
                    break;
                case 'General Knowledge':
                    $questions = Question::where('subject_id', $subject->id)->inRandomOrder()->limit(5)->get();
                    foreach($questions as $question) {
                        $challenge_question = new WeekQuestion;
                        $challenge_question->week_id = $current_week_id;
                        $challenge_question->question_id = $question->id;
                        $challenge_question->save();
                    }
            }
        }

        $this->info('Challenge questions set');
    }
}
