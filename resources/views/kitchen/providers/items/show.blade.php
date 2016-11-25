<?php 
	extract([
            'modalTitle'    => 'Details for ',
            'modalSync'     => 'itemSHOW',
            'modalClose'    => "'itemSHOW'",
            'model'         => 'Item',
            'related'       => "'item'",
            //'content'       => view('kitchen.items.providers.fields')
	]);
?>

@include('layouts.modal.relation-show')