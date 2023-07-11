<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserQuestion;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Score;
use App\Models\Payment;
use App\Models\Team;
use App\Models\Quiz;
use App\Models\QuizScore;
use App\Models\Bookmark;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
                            'name', 
                            'email', 
                            'password', 
                            'telephone',
                            'institution',
                            'level',
                            'bio',
                            'facebook',
                            'instagram',
                            'twitter'
                        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function user_questions()
    {
        return $this->hasMany(UserQuestion::class);
    }

    // public function answers() {
    //     return $this->hasMany(Answer::class);
    // }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function payments()
    {
        $this->hasMany(Payment::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function quiz_scores()
    {
        return $this->hasMany(QuizScore::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function level()
    {
        $this->belongsTo(Level::class);
    }

}
