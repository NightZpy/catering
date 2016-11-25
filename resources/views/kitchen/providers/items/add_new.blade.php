<?php
	extract([
            'modalTitle'    => 'Agregar Item a proveedor',
            'modalSync'     => 'itemADD',
            'modalClose'    => 'itemADD',
            'model'         => 'Pivot_item',
            'related'       => true,
            'type'			=> 'associate',
            'content'       => view('kitchen.providers.items.fields_new')
	]);
?>

@include('layouts.modal.relation-form')

