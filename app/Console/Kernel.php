<?php

namespace App\Console;

use App\Mail\QuizNotificationMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyChallengeReminder;
use App\Models\User;
use App\Models\Quiz;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{

    protected $commands = [
        Commands\ChallengeQuestions::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // create weekly challenge
        $schedule->command('challenge:weekly')->weeklyOn(6, '23:50');

        $schedule->call(function () {

            $users = User::select('email')->whereNotNull('email_verified_at')->get();

            foreach ($users as $user) {

                // info($user->email);

                Mail::to($user->email)->send(new WeeklyChallengeReminder($user));
            }
        })->fridays()->timezone('africa/douala')->between('8:00', '20:00');

        // notify users about new quizzes

        $schedule ->call(function() {
            $users = User::select('email')->whereNotNull('email_verified_at')->get();
            $quiz = Quiz::where('created_at', '>=', Carbon::now()->subDay())->get();

            foreach ($users as $user) {
                if(count($quiz) > 0) {
                    Mail::to($user->email)->send(new QuizNotificationMail($quiz));
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
