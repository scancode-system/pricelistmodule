<?php

namespace Modules\PriceList\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Modules\Client\Entities\Client;
use Modules\PriceList\Entities\PriceListClient;
use Modules\PriceList\Entities\PriceList;

use Modules\Product\Entities\Product;
use Modules\PriceList\Entities\PriceListProduct;


class RelationshipServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Product::addDynamicRelation('price_list_products', function (Product $product) {
            return $product->hasMany(PriceListProduct::class);
        });

        Client::addDynamicRelation('price_lists', function (Client $client) {
            return $client->belongsToMany(PriceList::class, 'price_list_client');
        });

        Client::addDynamicRelation('price_list_client', function (Client $client) {
            return $client->hasOne(PriceListClient::class);
        });
    }



    public function register()
    {

    }

}
