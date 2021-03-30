<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;

    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
        if($this->post->status == 2) {
            $authors = [];
            foreach( $this->post->users  as $author) {
                array_push($authors,$author->name);
            }
            if(sizeof($authors) > 1) {
                $msg = 'Los investigadores ' .join(', ', $authors). ' ha enviado una nueva publicación titulada ' .$this->post->title; 
            } else {
                $msg = 'El investigador ' .join(', ', $authors). ' ha enviado una nueva publicación titulada ' .$this->post->title; 
            }
           
            $subject = 'Nueva publicación';
        } else if($this->post->status == 3) {
            $msg = 'Su publicación ' .$this->post->title. ' ha sido aprobada y se publicara en Blog i-gamma'; 
            $subject = 'Publicación aprobada';
        } else if($this->post->status == 4) {
            $msg = 'Su publicación ' .$this->post->title. ' ha sido publicada en Blog i-gamma'; 
            $subject = 'Publicación publicada';
        }

        return (new MailMessage)->view(
            'emails.postStatus', [
                'data' => $msg,
                'user' => $notifiable,
                ]
        )->subject($subject);
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
