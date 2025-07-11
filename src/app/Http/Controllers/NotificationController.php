<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Notifications\ReservationNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\NotificationRequest;

class NotificationController extends Controller
{
    /**
     * お知らせメール送信ページを表示
     */
    public function showNotificationForm($reservationId)
    {
        $reservation = Reservation::with(['shop', 'user'])->findOrFail($reservationId);

        // オーナー権限チェック
        if ($reservation->shop->owner_id !== Auth::user()->id) {
            abort(403, 'この操作を実行する権限がありません。');
        }

        return view('owner.notification', compact('reservation'));
    }

    /**
     * お知らせメールを送信
     */
    public function sendNotification(NotificationRequest $request, $reservationId)
    {
        $reservation = Reservation::with(['shop', 'user'])->findOrFail($reservationId);

        // オーナー権限チェック
        if ($reservation->shop->owner_id !== Auth::user()->id) {
            abort(403, 'この操作を実行する権限がありません。');
        }

        try {
            // メール通知を送信
            $reservation->user->notify(new ReservationNotification($reservation, $request->message_type, $request->custom_message));

            $message = 'お知らせメールを送信しました';
            return redirect()->route('done', compact('message'));
        } catch (\Exception $e) {
            $message = 'メール送信に失敗しました: ' . $e->getMessage();
            return redirect()->back()->withErrors(['error' => $message]);
        }
    }

    /**
     * 予約リマインダーメールを一括送信（当日の予約があるユーザー全員に）
     */
    public function sendReminderEmails()
    {
        $today = now()->format('Y-m-d');

        $reservations = Reservation::with(['shop', 'user'])
            ->where('date', $today)
            ->get();

        $sentCount = 0;

        foreach ($reservations as $reservation) {
            try {
                $reservation->user->notify(new ReservationNotification($reservation, 'reminder'));
                $sentCount++;
            } catch (\Exception $e) {
                Log::error('Reminder email failed for reservation ' . $reservation->id . ': ' . $e->getMessage());
            }
        }

        return response()->json([
            'message' => $sentCount . '件のリマインダーメールを送信しました',
            'sent_count' => $sentCount
        ]);
    }
}
