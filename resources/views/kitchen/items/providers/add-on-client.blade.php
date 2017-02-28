<?php
	extract([
            'modalTitle'    => 'Agregar porveedor a {{ row.name }}',
            'modalSync'     => 'providerOnClientADD',
            'modalClose'    => 'providerOnClientADD',
            'model'         => 'Provider',
            'related'       => true,
            'selectedArray' => 'selected_providers',
            'type'			=> 'store-on-client',
            'content'       => view('kitchen.items.providers.fields')
	]);
?>

@include('layouts.modal.relation-form-on-client')