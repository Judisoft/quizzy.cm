<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Quiz;

class Share extends Model
{
    use HasFactory;

    protected $table = 'shares';
    protected $fillable = ['user_id', 'quiz_id', 'receipient_id'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

}
