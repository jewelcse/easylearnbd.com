<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscriber extends Notification implements ShouldQueue
{
    use Queueable;
    public $subscriberData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriberData = $subscriber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->greeting('Hello Admin')
                    ->subject('New Subscriber!')
                    ->line('A new subscriber added our list')
                    ->line('Subscriber Email: ',$this->subscriberData->email);
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
            'email'=>$this->subscriberData->email
        ];
    }
}
