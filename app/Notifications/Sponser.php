<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Sponser extends Notification
{
    use Queueable;
    private $sponsor_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sponsor_id)
    {
        //
        $this->$sponsor_id = $sponsor_id;
        
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
        /*
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
        
        $url = 'http://127.0.0.1:8000/sponsors/'.$this->$sponsor_id;

        return (new MailMessage)                 
                    ->subject('اضافة ولي امر')
                    ->line('اضافة ولي امر جديدة')
                    ->action('عرض ولي الامر', $url)
                    ->line('شكرا لاستخدامك القاسم  لادارة الايتام');
     */
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
