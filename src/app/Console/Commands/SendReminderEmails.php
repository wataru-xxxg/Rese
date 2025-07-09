<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use App\Notifications\ReservationNotification;
use Illuminate\Support\Facades\Log;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send-reminders {--date= : 特定の日付を指定 (YYYY-MM-DD)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '当日の予約があるユーザーにリマインダーメールを送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->option('date') ?: now()->format('Y-m-d');

        $this->info("{$date}の予約に対するリマインダーメールを送信します...");

        $reservations = Reservation::with(['shop', 'user'])
            ->where('date', $date)
            ->get();

        if ($reservations->isEmpty()) {
            $this->warn("{$date}の予約が見つかりませんでした。");
            return 0;
        }

        $this->info("{$reservations->count()}件の予約が見つかりました。");

        $bar = $this->output->createProgressBar($reservations->count());
        $bar->start();

        $sentCount = 0;
        $failedCount = 0;

        foreach ($reservations as $reservation) {
            try {
                $reservation->user->notify(new ReservationNotification($reservation, 'reminder'));
                $sentCount++;
            } catch (\Exception $e) {
                $failedCount++;
                Log::error("Reminder email failed for reservation {$reservation->id}: " . $e->getMessage());
                $this->error("予約ID {$reservation->id} のメール送信に失敗: " . $e->getMessage());
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();

        $this->info("送信完了: {$sentCount}件成功, {$failedCount}件失敗");

        return 0;
    }
}
