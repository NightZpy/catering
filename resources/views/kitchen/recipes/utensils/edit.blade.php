<?php 
	extract([
            'modalTitle'    => 'Edit {{ row.utensil.name }} for {{ row.name }}',
            'modalSync'     => 'utensilEDIT',
            'modalClose'    => 'utensilEDIT',
            'model'         => 'Utensil',
            'related'       => 'utensil',
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.utensils.fields')
	]);
?>
@include('layouts.modal.relation-form')
