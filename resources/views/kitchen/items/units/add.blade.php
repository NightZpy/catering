<?php
	extract([
            'modalTitle'    => 'Nueva unidad',
            'modalSync'     => 'unit_ADD_inform',
            'modalClose'    => 'unit_ADD_inform',
            'model'         => 'Unit',
            'type'			=> 'store',
            'content'       => view('kitchen.items.units.fields')
	]);
?>

@include('layouts.modal.relation-form')