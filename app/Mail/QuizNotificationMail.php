<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Quiz;

class QuizNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quiz;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.quiz_notification')
                    ->with([
                            'quiz' => $this->quiz
                    ]);
    }
}
