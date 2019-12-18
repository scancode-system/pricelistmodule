<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Order\Repositories\PriceModifyRepository;

class InsertPriceModifiersRecordsPricelist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        PriceModifyRepository::store(['module' => 'PriceList', 'priority' => 2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        PriceModifyRepository::destroyByModule('PriceList');
    }
}
