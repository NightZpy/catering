<?php
	extract([
            'modalTitle'    => 'Eliminar artículo ({{ row.item.name }}) asociado a <em>' . $baseRecipe->name . '</em>!',
            'modalSync'     => 'itemDELETE',
            'modalClose'    => 'itemDELETE',
            'model'         => 'Item',
            'related'       => 'item',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')