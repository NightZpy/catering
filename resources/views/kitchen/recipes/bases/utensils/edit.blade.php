<?php 
	extract([
            'modalTitle'    => 'Edit utensil for {{ row.name }}',
            'modalSync'     => 'utensilEDIT',
            'modalClose'    => 'utensilEDIT',
            'model'         => 'Utensil',
            'related'       => 'utensil',
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.bases.utensils.fields')
	]);
?>
@include('layouts.modal.relation-form')
