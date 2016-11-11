<?php 
	extract([
            'modalTitle'    => 'Detalles para ',
            'modalSync'     => 'providerSHOW',
            'modalClose'    => "'providerSHOW'",
            'model'         => 'Provider',
            'related'       => "'provider'",
            //'content'       => view('kitchen.items.providers.fields')
	]);
?>

@include('layouts.modal.relation-show')