<?php 
	extract([
            'modalTitle'    => 'Edit {{ row.base.name }} for {{ row.name }}',
            'modalSync'     => 'baseEDIT',
            'modalClose'    => 'baseEDIT',
            'model'         => 'Base',
            'related'       => 'base',
            'type'			=> 'store',
            'content'       => view('kitchen.recipes.base-recipes.fields')
	]);
?>
@include('layouts.modal.relation-form')
