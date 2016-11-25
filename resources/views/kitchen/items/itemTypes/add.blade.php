<?php
	extract([
            'modalTitle'    => 'Nuevo tipo de item',
            'modalSync'     => 'itemType_ADD_inform',
            'modalClose'    => 'itemType_ADD_inform',
            'model'         => 'item_type',
            'type'			=> 'store',
            'content'       => view('kitchen.items.itemTypes.fields')
	]);
?>

@include('layouts.modal.relation-form')