<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Acceptnot extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
 
          protected $bookname;
          protected $user;


    public function __construct($user, $bookname)
    {


        $this->bookname= $bookname;
        $this->user= $user;



    }
    

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'message' => 'Your requests for '.$this->bookname. ' has been accepted message the user for logistical process',
            // 'link'=>'/messages/'.$this->user->id,
        ];
    }
}
