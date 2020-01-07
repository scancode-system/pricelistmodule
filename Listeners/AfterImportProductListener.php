<?php

namespace Modules\PriceList\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\PriceList\Repositories\PriceListProductRepository;
use Modules\PriceList\Repositories\PriceListRepository;

class AfterImportProductListener
{

    public function handle($event)
    {
        $product = $event->product();
        $price_list_products = $this->selectFields($event->data());

        PriceListProductRepository::destroyAllByProduct($product);
        foreach ($price_list_products as $price_list_product) {
            PriceListProductRepository::store($price_list_product+['product_id' => $product->id]);
        }

    }

    private function selectFields($data)
    {
        $price_list_products = collect([]);
        foreach ($data as $field => $value) 
        {
            if(preg_match('/\b(price_list_\w*)\b/', $field))
            {
                $price_list_id = $this->priceListId(str_replace('price_list_', '', $field));
                $price_list_products->push(['price_list_id' => $price_list_id, 'price' => $value]);
            }
        }
        return $price_list_products;
    }

       /* public function handle($event)
    {
        $data = $event->data();
        return ['color_id' => $this->colorId($data['color'])];
    }*/


    private function priceListId($price_list_name)
    {
        $price_list = PriceListRepository::loadByName($price_list_name);
        if(!$price_list)
        {
            $price_list = PriceListRepository::store(['name' => $price_list_name]);
        } 
        return $price_list->id;   
    }

}
