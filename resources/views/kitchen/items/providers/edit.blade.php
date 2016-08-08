<?php 
	extract([
            'modalTitle'    => 'Edit Provider for ' . $item->name,
            'modalSync'     => 'editProvider',
            'modalClose'    => "'editProvider'",
            'model'         => 'Provider',
            'related'       => "'provider'",
            'content'       => view('kitchen.items.providers.fields')
	]);
?>
@include('layouts.modal.relation-form')
