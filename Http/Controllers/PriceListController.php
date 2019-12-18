<?php

namespace Modules\PriceList\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PriceList\Repositories\PriceListRepository;
use Modules\PriceList\Http\Requests\PriceListRequest;

class PriceListController extends Controller
{


    public function store(PriceListRequest $request)
    {
        PriceListRepository::store($request->all());
        return back()->with('success', 'Tabela de preço criada.');
    }

}
