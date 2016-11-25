<?php 
	extract([
            'modalTitle'    => 'Edit Item for ' . $provider->name,
            'modalSync'     => 'itemEDIT',
            'modalClose'    => 'itemEDIT',
            'model'         => 'Pivot_item',
            'related'       => true,
            'type'			=> 'associate',
            'content'       => view('kitchen.providers.items.fields_new')
	]);
?>
@include('layouts.modal.relation-form')
