<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Reservation;

class ReservationNotification extends Notification
{
    use Queueable;

    protected $reservation;
    protected $type;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, $type = 'info', $message = null)
    {
        $this->reservation = $reservation;
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $shop = $this->reservation->shop;
        $user = $this->reservation->user;
        $customMessage = $this->message;

        switch ($this->type) {
            case 'reminder':
                return (new MailMessage)
                    ->subject('【予約リマインダー】' . $shop->name . 'のご予約について')
                    ->greeting($user->name . '様')
                    ->line('本日のご予約についてお知らせいたします。')
                    ->line('店舗名: ' . $shop->name)
                    ->line('予約日: ' . $this->reservation->date)
                    ->line('時間: ' . \Carbon\Carbon::parse($this->reservation->time)->format('H:i'))
                    ->line('人数: ' . $this->reservation->number . '人')
                    ->line('お気をつけてお越しください。')
                    ->when($customMessage, function ($mail) use ($customMessage) {
                        return $mail->line($customMessage);
                    })
                    ->salutation('よろしくお願いいたします。');

            case 'change':
                return (new MailMessage)
                    ->subject('【予約変更】' . $shop->name . 'のご予約について')
                    ->greeting($user->name . '様')
                    ->line('ご予約の変更が完了いたしました。')
                    ->line('店舗名: ' . $shop->name)
                    ->line('予約日: ' . $this->reservation->date)
                    ->line('時間: ' . \Carbon\Carbon::parse($this->reservation->time)->format('H:i'))
                    ->line('人数: ' . $this->reservation->number . '人')
                    ->line('変更された内容をご確認ください。')
                    ->when($customMessage, function ($mail) use ($customMessage) {
                        return $mail->line($customMessage);
                    })
                    ->salutation('よろしくお願いいたします。');

            case 'cancel':
                return (new MailMessage)
                    ->subject('【予約キャンセル】' . $shop->name . 'のご予約について')
                    ->greeting($user->name . '様')
                    ->line('ご予約のキャンセルが完了いたしました。')
                    ->line('店舗名: ' . $shop->name)
                    ->line('予約日: ' . $this->reservation->date)
                    ->line('時間: ' . \Carbon\Carbon::parse($this->reservation->time)->format('H:i'))
                    ->line('人数: ' . $this->reservation->number . '人')
                    ->line('またのご利用をお待ちしております。')
                    ->when($customMessage, function ($mail) use ($customMessage) {
                        return $mail->line($customMessage);
                    })
                    ->salutation('よろしくお願いいたします。');

            default:
                return (new MailMessage)
                    ->subject('【お知らせ】' . $shop->name . 'のご予約について')
                    ->greeting($user->name . '様')
                    ->line('ご予約についてお知らせいたします。')
                    ->line('店舗名: ' . $shop->name)
                    ->line('予約日: ' . $this->reservation->date)
                    ->line('時間: ' . \Carbon\Carbon::parse($this->reservation->time)->format('H:i'))
                    ->line('人数: ' . $this->reservation->number . '人')
                    ->when($customMessage, function ($mail) use ($customMessage) {
                        return $mail->line($customMessage);
                    })
                    ->salutation('よろしくお願いいたします。');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'type' => $this->type,
            'shop_name' => $this->reservation->shop->name,
            'date' => $this->reservation->date,
            'time' => $this->reservation->time,
        ];
    }
}
