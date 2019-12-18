<?php

namespace Modules\PriceList\Http\ViewComposers\Loader\Products;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\PriceList\Repositories\PriceListRepository;

class EditComposer extends ServiceComposer 
{

    private $select_price_lists;

    public function assign($view)
    {
        $this->selectPriceLists();
    }


    private function selectPriceLists()
    {
        $this->select_price_lists = PriceListRepository::loadToSelect('id', 'name');
    }


    public function view($view)
    {
        $view->with('select_price_lists', $this->select_price_lists);
    }

}