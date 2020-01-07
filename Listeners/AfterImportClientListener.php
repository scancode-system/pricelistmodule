<?php

namespace Modules\PriceList\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\PriceList\Repositories\PriceListRepository;

class AfterImportClientListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $price_list_name = ($event->data())['price_list_name'];
        $price_list = PriceListRepository::loadByName($price_list_name);

        if($price_list)
        {
            $client = $event->client();
            $client->price_lists()->detach();
            $client->price_lists()->attach($price_list);
        }

    }
}
