<?php
	extract([
            'modalTitle'    => 'Add Provider to ' . $item->name,
            'modalSync'     => 'addProviderToItem',
            'modalClose'    => "'addProviderToItem'",
            'model'         => 'Provider',
            'related'       => "'provider'",
            'content'       => view('kitchen.items.providers.fields')
	]);
?>

@include('layouts.modal.relation-form')