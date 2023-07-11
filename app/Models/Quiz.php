<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\User;
use App\Models\Question;
use App\Models\QuizScore;
use App\Models\Like;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = [
        'title',
        'user_id',
        'question_id',
        'subject_id', 
        'slug'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_questions', 'quiz_id', 'question_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function hasAuthUserBookmarkedQuiz(){
        return $this->bookmarks()->where('user_id',  auth()->user()->id)->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function hasAuthUserLikedQuiz(){
        return $this->likes()->where('user_id',  auth()->user()->id)->exists();
    }

    public function quiz_scores()
    {
        return $this->hasMany(QuizScore::class);
    }

    // View counter

    public function incrementViewCount() {
        $this->views++;
        return $this->save();
    }

    public function shares()
    {
        return $this->hasMany(Like::class);
    }
}
