<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Topic;
use App\Models\Quiz;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = ['title'];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
