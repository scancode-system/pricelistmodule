<tr>
	<td class="align-middle">@currency($price_list_product->price)</td>
	<td class="align-middle">{{ $price_list_product->price_list->name }}</td>
	<td class="text-right align-middle">
		{{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#price_list_product_destroy_'.$price_list_product->id]) }}
	</td>
</tr>
@modal_destroy(['route_destroy' => 'pricelistproduct.destroy', 'model' => $price_list_product, 'modal_id' => 'price_list_product_destroy_'.$price_list_product->id])