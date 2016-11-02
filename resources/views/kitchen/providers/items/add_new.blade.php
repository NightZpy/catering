<?php
	extract([
            'modalTitle'    => 'Asociar Item',
            'modalSync'     => 'itemADD',
            'modalClose'    => 'itemADD',
            'model'         => 'RelationItem',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.providers.items.fields_new')
	]);
?>

@include('layouts.modal.relation-form')

