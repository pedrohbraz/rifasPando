<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\GeracaoDeRifas' => [
            'App\Listeners\GeracaoDeRifasListener',
        ],
        'App\Events\SoftDeleteRifas' => [
            'App\Listeners\SoftDeleteRifasListener'
        ],
        'App\Events\DissociaUser' => [
            'App\Listeners\DissociaUserListener'
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
