<?php 

namespace Modules\PriceList\Services;

use Modules\Order\Entities\Item;
use Modules\PriceList\Repositories\PriceListProductRepository;

class PriceModifyService {

	private $block = false;

	public function price(Item $item, $price)
	{
		$price_list_client = $item->order->order_client->client->price_list_client;
		if($price_list_client){
			$price_list_product = PriceListProductRepository::loadByProductIdPriceListId($item->product_id, $price_list_client->price_list_id);
			if($price_list_product)
			{
				$price = $price_list_product->price;
				$this->block = true;
			}
		}
		return $price;
	}


	public function block()
	{
		return $this->block;
	}


}