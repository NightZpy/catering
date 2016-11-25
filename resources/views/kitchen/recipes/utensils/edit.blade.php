<?php 
	extract([
            'modalTitle'    => 'Editar {{ row.utensil.name }} para {{ row.name }}',
            'modalSync'     => 'utensilEDIT',
            'modalClose'    => 'utensilEDIT',
            'model'         => 'Utensil',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.utensils.fields')
	]);
?>
@include('layouts.modal.relation-form')
