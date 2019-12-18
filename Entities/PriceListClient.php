<?php

namespace Modules\PriceList\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\PriceList\Entities\PriceList;

class PriceListClient extends Pivot
{
	protected $fillable = [];

	public function price_list()
	{
		return $this->belongsTo(PriceList::class);
	}
}
