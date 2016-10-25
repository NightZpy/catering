<?php 
	extract([
            'modalTitle'    => 'Edit Provider for ' . $item->name,
            'modalSync'     => 'providerEDIT',
            'modalClose'    => 'providerEDIT',
            'model'         => 'Provider',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.items.providers.fields')
	]);
?>
@include('layouts.modal.relation-form')
