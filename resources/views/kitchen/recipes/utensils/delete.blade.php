<?php
	extract([
            'modalTitle'    => 'Eliminar Utensilio ({{ row.utensil.name }}) asociado a <em>' . $recipe->name . '</em>!',
            'modalSync'     => 'utensilDELETE',
            'modalClose'    => 'utensilDELETE',
            'model'         => 'Utensil',
            'related'       => 'utensil',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')