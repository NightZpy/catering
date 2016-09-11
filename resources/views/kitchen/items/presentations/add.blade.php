<?php
	extract([
            'modalTitle'    => 'Nueva unidad',
            'modalSync'     => 'unitADD',
            'modalClose'    => 'unitADD',
            'model'         => 'Unit',
            'type'			=> 'store',
            'content'       => view('kitchen.items.units.fields')
	]);
?>

@include('layouts.modal.relation-form')