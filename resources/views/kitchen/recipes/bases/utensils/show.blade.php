<?php 
	extract([
            'modalTitle'    => 'Details for {{ row.utensil.name }}',
            'modalSync'     => 'utensilSHOW',
            'modalClose'    => "'utensilSHOW'",
            'model'         => 'utensil',
            'related'       => "'utensil'",
            //'content'       => view('kitchen.utensils.utensils.fields')
	]);
?>

@include('layouts.modal.relation-show')