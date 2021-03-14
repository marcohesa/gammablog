<?php

namespace App\Listeners;

use App\Events\NewUser;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyAdminsAboutNewUser
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
       
        $users = User::whereHas('roles',function($query) {
            $query->whereIn('role_id',[1,2]);
        })->get();
        Notification::send($users, new NewUserNotification());
        
    }
}
