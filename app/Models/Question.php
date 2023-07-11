<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Week;
use App\Models\Challenge;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['content',
                            'A',
                            'B',
                            'C',
                            'D',
                            'answer',
                            'user_id',
                            'subject_id',
                            'topic_id',
                            'duration',
                            'points',
                            'level_id'
                            ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_questions', 'quiz_id', 'question_id');
    }

    public function weeks()
    {
        return $this->belongsToMany(Week::class, 'week_questions', 'week_id', 'question_id');
    }

}
