<?php
	extract([
            'modalTitle'    => 'Nueva Subfamilia',
            'modalSync'     => 'subFamily_ADD_inform',
            'modalClose'    => 'subFamily_ADD_inform',
            'model'         => 'sub_family',
            'type'			=> 'store',
            'content'       => view('kitchen.items.families.sub.fields')
	]);
?>

@include('layouts.modal.relation-form')