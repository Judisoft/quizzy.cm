<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Challenge extends Model
{
    use HasFactory;

    protected $table = 'challenges';

    protected $fillable = ['week_id', 'question_id'];

    public function week() {
        return $this->belongsTo(Week::class);
    }
}
