<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class QuizUpdate extends Mailable
{
    use Queueable, SerializesModels;
    public $users;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->email = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.quiz_update_mail')
                    ->with([
                        'users' => $this->users->email,
                        'quiz_url' => 'Link'
                    ]);
    }
}
