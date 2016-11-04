<?php
	extract([
            'modalTitle'    => 'Add Item to {{ row.name }} provider',
            'modalSync'     => 'itemADD',
            'modalClose'    => 'itemADD',
            'model'         => 'Pivot_item',
            'related'       => true,
            'type'			=> 'associate',
            'content'       => view('kitchen.providers.items.fields_new')
	]);
?>

@include('layouts.modal.relation-form')

