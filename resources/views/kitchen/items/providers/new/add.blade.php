<?php
	extract([
            'modalTitle'    => 'Add New Provider',
            'modalSync'     => 'provider_ADD',
            'modalClose'    => 'provider_ADD',
            'model'         => 'Provider',
            //'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.providers.fields')
	]);
?>

@include('layouts.modal.relation-form')
