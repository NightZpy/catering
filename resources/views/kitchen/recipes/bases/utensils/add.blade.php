<?php
	extract([
            'modalTitle'    => 'Add Utensil to {{ row.name }}',
            'modalSync'     => 'utensilADD',
            'modalClose'    => 'utensilADD',
            'model'         => 'Provider',
            'related'       => 'utensil',
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.bases.utensils.fields')
	]);
?>

@include('layouts.modal.relation-form')