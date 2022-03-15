<?php

namespace App\Providers;

use App\Models\Samu\Call;
use App\Models\Samu\Event;
use App\Models\Samu\MobileInService;
use App\Observers\MobileInServiceObserver;
use App\Observers\Samu\CallObserver;
use App\Observers\Samu\EventObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Event;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Call::observe(CallObserver::class);
        Event::observe(EventObserver::class);
        MobileInService::observe(MobileInServiceObserver::class);
    }
}
