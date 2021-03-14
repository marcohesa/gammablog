<?php

namespace App\Listeners;

use App\Events\UserStatus;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUsersAboutStatusUser
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
     * @param  UserStatus  $event
     * @return void
     */
    public function handle(UserStatus $event)
    {
        if($event->user->roles()->first()->id) {
            Notification::send($event->user, new UserNotification($event->user));
        } 
    }
}
