<?php
	extract([
            'modalTitle'    => 'Add Utensil to {{ row.name }}',
            'modalSync'     => 'utensilADD',
            'modalClose'    => 'utensilADD',
            'model'         => 'Utensil',
            'related'       => true,
            'type'          => 'store',            
            'content'       => view('kitchen.recipes.utensils.fields')
	]);
?>

@include('layouts.modal.relation-form')