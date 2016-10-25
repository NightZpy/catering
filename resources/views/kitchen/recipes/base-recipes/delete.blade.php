<?php
	extract([
            'modalTitle'    => 'Delete Base Recipe ({{ row.base.name }}) associate to <em>' . $recipe->name . '</em>!',
            'modalSync'     => 'baseDELETE',
            'modalClose'    => 'baseDELETE',
            'model'         => 'Base',
            'related'       => 'base',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')