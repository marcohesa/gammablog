<?php

namespace App\Listeners;

use App\Events\PasswordUser;
use App\Notifications\UserPasswordNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUserAboutNewPassword
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
     * @param  PasswordUser  $event
     * @return void
     */
    public function handle(PasswordUser $event)
    {
        Notification::send($event->user, new UserPasswordNotification($event->user));
    }
}
