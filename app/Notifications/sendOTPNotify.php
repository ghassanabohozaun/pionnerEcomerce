<?php

namespace App\Notifications;

use Ichtrojan\Otp\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendOTPNotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $otp;
    protected $message;
    protected $header;

    public function __construct()
    {
        $this->header = __('auth.confirm.reset_password_verification_code');
        $this->message = __('auth.please_use_the_code_to_rest_your_password');
        $this->otp = new Otp();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $otp = $this->otp->generate($notifiable->email, 'numeric', 5, 40);
        return (new MailMessage())
            ->greeting($this->header)
            ->line($this->message)
            ->line('Code :' .$otp->token);
     }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
                //
            ];
    }
}
