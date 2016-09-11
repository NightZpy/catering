<?php
	extract([
            'modalTitle'    => 'Nueva presentación',
            'modalSync'     => 'presentationADD',
            'modalClose'    => 'presentationADD',
            'model'         => 'Presentation',
            'type'			=> 'store',
            'content'       => view('kitchen.items.presentations.fields')
	]);
?>

@include('layouts.modal.relation-form')