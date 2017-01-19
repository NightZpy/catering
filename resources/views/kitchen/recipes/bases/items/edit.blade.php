<?php 
	extract([
            'modalTitle'    => 'Editar {{ row.item.name }} para {{ row.name }}',
            'modalSync'     => 'itemEDIT',
            'modalClose'    => 'itemEDIT',
            'model'         => 'Item',
            'related'       => true,
            'type'			=> 'edit',
            'content'       => view('kitchen.recipes.bases.items.fields')
	]);
?>
@include('layouts.modal.relation-form')
