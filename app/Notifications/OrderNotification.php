<?php

namespace App\Notifications;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    public $receipt;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Receipt $receipt, User $user)
    {
        $this->user = $user;
        $this->receipt = $receipt;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line($this->user->name.' is ordering')
                    ->action('Notification Action', url('/admin'))
                    ->line('Please Check the ordering process.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            "user" => $this->user,
            "receipt" => $this->receipt,
        ];
    }
}
