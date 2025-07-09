<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // 毎日9時に当日の予約リマインダーメールを送信
        $schedule->command('emails:send-reminders')
            ->dailyAt('09:00')
            ->withoutOverlapping()
            ->runInBackground()
            ->onSuccess(function () {
                Log::info('リマインダーメール送信が正常に完了しました');
            })
            ->onFailure(function () {
                Log::error('リマインダーメール送信に失敗しました');
            });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
