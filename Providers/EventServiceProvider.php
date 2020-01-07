<?php

namespace Modules\PriceList\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Modules\Client\Events\AfterImportEvent;
use Modules\Product\Events\AfterImportEvent as AfterImportProduct;
use Modules\PriceList\Listeners\AfterImportClientListener;
use Modules\PriceList\Listeners\AfterImportProductListener;

class EventServiceProvider extends ServiceProvider 
{

	public function boot() 
	{

	}

	public function register() 
	{
		Event::listen(AfterImportProduct::class, AfterImportProductListener::class);
		Event::listen(AfterImportEvent::class, AfterImportClientListener::class);
	}

}
