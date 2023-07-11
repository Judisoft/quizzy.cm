<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekQuestion extends Model
{
    use HasFactory;

    protected $table = 'week_questions';
    protected $fillable = ['week_id', 'question_id'];
}
