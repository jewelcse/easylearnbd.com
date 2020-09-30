<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAuthorStory extends Notification
{
    use Queueable;
    public $story;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($story)
    {
        $this->story = $story;
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
                    ->greeting('Hello Admin,')
                    ->subject('New Story Approval Needed!')
                    ->line('Submitted by '.$this->story->user->first_name." ".$this->story->user->last_name." need to approve.")
                    ->line("Title: ".$this->story->title)
                    ->action('Click story Approval URL', url('admin/story/review',$this->story->id))
                    ->line('Thank you!');
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
