<hr>
{{ Form::Model($client->price_list_client, ['route' => ['pricelistclient.store', $client]]) }}
{{ Form::label('price_list_id', 'Cliente está vinculado a alguma tabela de preço?') }}
<div class="row">
	<div class="col-md-10">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-prepend" data-toggle="modal" data-target="#modal_create_price_list">
					{{ Form::button('<i class="fa fa-plus-square-o"></i>', ['class' => 'btn btn-primary']) }}
				</span>
				{{ Form::select('price_list_id', $select_price_lists, null, ['class' => 'form-control', 'placeholder' => 'Tabelas de preço']) }}
			</div>
		</div>
	</div>
	<div class="col-md-2">
		{{ Form::button('<i class="fa fa-save float-left"></i><span>Salvar</span>', ['class' => 'w-100 btn btn-brand btn-primary', 'type' => 'submit']) }}
	</div>
</div>
{{ Form::close() }}
@include('pricelist::loader.products.modals.modal_create_price_list')
