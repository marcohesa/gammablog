<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\PasswordUser' => [
            'App\Listeners\NotifyUserAboutNewPassword',
        ],
        'App\Events\PostStatus' => [
            'App\Listeners\NotifyUsersAboutStatusPost',
        ],
        'App\Events\NewUser' => [
            'App\Listeners\NotifyAdminsAboutNewUser',
        ],
        'App\Events\UserStatus' => [
            'App\Listeners\NotifyUsersAboutStatusUser',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
