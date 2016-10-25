<?php
	extract([
            'modalTitle'    => 'Delete Utensil ({{ row.utensil.name }}) associate to <em>' . $recipe->name . '</em>!',
            'modalSync'     => 'utensilDELETE',
            'modalClose'    => 'utensilDELETE',
            'model'         => 'Utensil',
            'related'       => 'utensil',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')