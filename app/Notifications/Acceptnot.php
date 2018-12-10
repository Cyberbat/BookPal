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
                    ->from('BookPal@hello.com')
                    ->line('Your requests for '.$this->bookname. ' has been accepted')
                    ->action('Notification Action', url('/login'))
                    ->line('Thank you for using BookPal!');
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
