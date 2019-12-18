<hr>
{{ Form::open(['route' => 'pricelistproduct.store']) }}
{{ Form::hidden('product_id', $product->id) }}
<div class="row">
	<div class="col-md-5">
		{{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Preço da Tabela']) }}
	</div>
	<div class="col-md-5">
		<div class="input-group">
			<span class="input-group-prepend" data-toggle="modal" data-target="#modal_create_price_list">
				{{ Form::button('<i class="fa fa-plus-square-o"></i>', ['class' => 'btn btn-primary']) }}
			</span>
			{{ Form::select('price_list_id', $select_price_lists, null, ['class' => 'form-control', 'placeholder' => 'Tabelas de preço']) }}
		</div>
	</div>
	<div class="col-md-2">
		{{ Form::button('<i class="fa fa-save float-left"></i><span>Salvar</span>', ['class' => 'w-100 btn btn-brand btn-primary', 'type' => 'submit']) }}
	</div>
</div>
{{ Form::close() }}

<table class="table table-responsive-sm bg-white table-hover border mt-3">
	@include('pricelist::loader.products.tables.thead')
	<tbody>
		@each('pricelist::loader.products.tables.tr', $product->price_list_products, 'price_list_product')
	</tbody>
</table>
@include('pricelist::loader.products.modals.modal_create_price_list')