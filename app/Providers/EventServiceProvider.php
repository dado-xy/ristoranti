<?php

namespace App\Providers;

use App\Events\OrderConfirm;
use App\Events\ProductAdded;
use App\Listeners\SendNewProductAdded;
use App\Listeners\SendOrderConfirmEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        OrderConfirm::class => [
            SendOrderConfirmEmail::class
        ],

        ProductAdded::class => [
            SendNewProductAdded::class
        ]

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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
