<?php 
	extract([
            'modalTitle'    => 'Details for {{ row.base.name }}',
            'modalSync'     => 'baseSHOW',
            'modalClose'    => "'baseSHOW'",
            'model'         => 'Base',
            'related'       => "'base'",
            //'content'       => view('kitchen.utensils.utensils.fields')
	]);
?>

@include('layouts.modal.relation-show')