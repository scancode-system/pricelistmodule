<?php

namespace Modules\PriceList\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PriceList\Repositories\PriceListProductRepository;
use Modules\PriceList\Entities\PriceListProduct;
use Modules\PriceList\Http\Requests\PriceListProductRequest;

class PriceListProductController extends Controller
{


    public function store(PriceListProductRequest $request)
    {
        $price_list_product = PriceListProductRepository::store($request->all());
        return back()->with('success', 'Preço na tabela '.$price_list_product->price_list->name.' criado.');
    }


    public function destroy(Request $request, PriceListProduct $price_list_product)
    {
        PriceListProductRepository::destroy($price_list_product);
        return back()->with('success', 'Preço da tabela '.$price_list_product->price_list->name.' removido.');
    }


}
