<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaidNotification extends Notification
{
    use Queueable;
    public $pdf;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($pdf)
     {
         $this->pdf = $pdf;
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
      return (new MailMessage)
          ->line('You have Paid For your Assingment ')
          ->line('Thank For Dealing With Us.')
          ->action('Check Your Dashboard', route('index'))
          ->attachData($this->pdf->output(),'paid-inovice.pdf');
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
            //
        ];
    }
}
