<?php

namespace App\Listeners;

use App\Events\PostStatus;
use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUsersAboutStatusPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostStatus  $event
     * @return void
     */
    public function handle(PostStatus $event)
    {   

        if($event->post->status == 2) {

            $users = User::whereHas('roles',function($query) {
                $query->whereIn('role_id',[1,2]);
            })->get();

            Notification::send($users, new PostNotification($event->post));

        } else {

            $users =  $event->post->users;
            
            Notification::send($users, new PostNotification($event->post));
        }

        
    }
}
