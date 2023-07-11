<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PerformanceAnalysis;

class QuizScore extends Model
{
    use HasFactory;

    protected $table = 'quiz_score';
    protected $fillable = [
                            'quiz_id',
                            'user_id',
                            'score'
                        ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function hasAuthUserTakenQuiz($quiz_id)
    {
        return $this->where('user_id', auth()->user()->id)->where('quiz_id', $quiz_id)->exists();
    }

}
