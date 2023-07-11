<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Question;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';
    protected $fillable = ['topic'];

    // public function subject()
    // {
    //     return $this->belongsTo(Subject::class);
    // }

    public function quetions()
    {
        return $this->hasMany(Question::class);
    }
}
