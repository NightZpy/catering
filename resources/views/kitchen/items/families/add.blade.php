<?php
	extract([
            'modalTitle'    => 'Nueva familia',
            'modalSync'     => 'family_ADD_inform',
            'modalClose'    => 'family_ADD_inform',
            'model'         => 'Family',
            'type'			=> 'store',
            'content'       => view('kitchen.items.families.fields')
	]);
?>

@include('layouts.modal.relation-form')