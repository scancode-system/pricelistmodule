<?php

Route::prefix('pricelists')->middleware('auth')->group(function() {
	// post
	Route::post('/', 'PriceListController@store')->name('pricelists.store');
});


Route::prefix('pricelistproduct')->middleware('auth')->group(function() {
	// post
	Route::post('/', 'PriceListProductController@store')->name('pricelistproduct.store');

	// delete
	Route::delete('{price_list_product}', 'PriceListProductController@destroy')->name('pricelistproduct.destroy');
});


Route::prefix('pricelistclient')->middleware('auth')->group(function() {
	// post
	Route::post('{client}', 'PriceListClientController@store')->name('pricelistclient.store');
});
