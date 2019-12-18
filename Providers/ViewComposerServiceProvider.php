<?php

namespace Modules\PriceList\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\PriceList\Http\ViewComposers\Loader\Products\EditComposer;

class ViewComposerServiceProvider extends ServiceProvider 
{

	public function boot() {
		View::composer(['pricelist::loader.products.edit', 'pricelist::loader.clients.edit'], EditComposer::class);
	}

	public function register() {
        //
	}

}
