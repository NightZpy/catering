<?php
	extract([
            'modalTitle'    => 'Nueva presentación',
            'modalSync'     => 'presentation_ADD_inform',
            'modalClose'    => 'presentation_ADD_inform',
            'model'         => 'Presentation',
            'type'			=> 'store',
            'content'       => view('kitchen.items.presentations.fields')
	]);
?>

@include('layouts.modal.relation-form')