<?php 
	extract([
            'modalTitle'    => 'Detalles de {{ row.item.name }}',
            'modalSync'     => 'itemSHOW',
            'modalClose'    => "'itemSHOW'",
            'model'         => 'item',
            'related'       => "'item'",
            //'content'       => view('kitchen.items.items.fields')
	]);
?>

@include('layouts.modal.relation-show')