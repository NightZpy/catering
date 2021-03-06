<?php
	extract([
            'modalTitle'    => 'Add Provider to {{ row.name }}',
            'modalSync'     => 'providerADD',
            'modalClose'    => 'providerADD',
            'model'         => 'Provider',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.items.providers.fields')
	]);
?>

@include('layouts.modal.relation-form')