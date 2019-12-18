<?php

namespace Modules\PriceList\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PriceList\Repositories\PriceListRepository;
use Modules\Client\Entities\Client;

class PriceListClientController extends Controller
{
 
    public function store(Request $request, Client $client)
    {
        $client->price_lists()->detach();
        $price_list = PriceListRepository::loadById($request->price_list_id);
        if($price_list)
        {
            $client->price_lists()->attach($price_list);
        }
        return back()->with('success', 'Cliente atualizado.');
    }

}
