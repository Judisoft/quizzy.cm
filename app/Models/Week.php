<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Challenge;
use App\Models\Question;

class Week extends Model
{
    use HasFactory;

    protected $table = 'weeks';

    protected $fillable = ['title', 'challenge_id'];

    public function challenge() {
        return $this->hasOne(Challenge::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class, 'week_questions', 'week_id', 'question_id');
    }
}
