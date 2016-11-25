<?php
	extract([
            'modalTitle'    => 'Agregar Item',
            'modalSync'     => 'item_ADD_inform',
            'modalClose'    => 'item_ADD_inform',
            'model'         => 'Item',
            //'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.providers.items.fields')
	]);
?>

@include('layouts.modal.relation-form')

