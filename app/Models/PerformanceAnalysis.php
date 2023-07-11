<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Topic;

class PerformanceAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
                            'quiz_id',
                            'user_id',
                            'question_id',
                            'answer_correct'
                        ];
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function quiz_score()
    {
        return $this->belongsTo(QuizScore::class);
    }
  
}
