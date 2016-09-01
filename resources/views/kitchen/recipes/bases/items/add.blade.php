<?php
	extract([
            'modalTitle'    => 'Add Item to {{ row.name }}',
            'modalSync'     => 'itemADD',
            'modalClose'    => 'itemADD',
            'model'         => 'Item',
            'related'       => 'item',
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.bases.items.fields')
	]);
?>

@include('layouts.modal.relation-form')