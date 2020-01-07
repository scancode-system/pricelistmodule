<?php

namespace Modules\PriceList\Repositories;

use Modules\PriceList\Entities\PriceList;

class PriceListRepository
{

	// LOAD
	public static function loadByName($name){
		return PriceList::where('name', $name)->first();
	}

	public static function loadById($id){
		return PriceList::find($id);
	}

	public static function loadToSelect($value, $description){
		return PriceList::pluck($description, $value);
	}


	// SAVE
	public static function store($data){
		return PriceList::create($data);
	}


}
