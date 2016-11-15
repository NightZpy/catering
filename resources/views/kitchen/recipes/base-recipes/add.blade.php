<?php
	extract([
            'modalTitle'    => 'Agregar base a {{ row.name }}',
            'modalSync'     => 'baseADD',
            'modalClose'    => 'baseADD',
            'model'         => 'Base',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.base-recipes.fields')
	]);
?>

@include('layouts.modal.relation-form')