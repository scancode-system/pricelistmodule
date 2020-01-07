<?php

namespace Modules\PriceList\Repositories;

use Modules\PriceList\Entities\PriceListProduct;
use Modules\Product\Entities\Product;

class PriceListProductRepository
{

	// LOAD
	public static function load(){
		return PriceListProduct::all();
	}

	public static function loadByProductIdPriceListId($product_id, $price_list_id){
		return PriceListProduct::where('product_id', $product_id)->where('price_list_id', $price_list_id)->first();
	}

	// SAVE
	public static function store($data){
		return PriceListProduct::create($data);
	}


	// DELETE
	public static function destroy(PriceListProduct $price_list_product){
		$price_list_product->delete();
	}
 
 	// DESTROY
	public static function destroyAllByProduct(Product $product)
	{
		$price_list_products = $product->price_list_products;
		foreach ($price_list_products as $price_list_product) {
			$price_list_product->delete();
		}
	}

}
