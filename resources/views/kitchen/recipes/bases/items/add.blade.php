<?php
	extract([
            'modalTitle'    => 'Agregar artículo a {{ row.name }}',
            'modalSync'     => 'itemADD',
            'modalClose'    => 'itemADD',
            'model'         => 'Item',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.bases.items.fields')
	]);
?>

@include('layouts.modal.relation-form')