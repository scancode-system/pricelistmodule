<?php

namespace Modules\PriceList\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\PriceList\Entities\PriceList;

class PriceListProduct extends Pivot
{
    protected $guarded = [];

    public function price_list()
	{
		return $this->belongsTo(PriceList::class);
	}
}
