<?php
	extract([
            'modalTitle'    => 'Delete Item ({{ row.item.name }}) associate to <em>' . $provider->name . '</em>!',
            'modalSync'     => 'itemDELETE',
            'modalClose'    => 'itemDELETE',
            'model'         => 'Item',
            'related'       => 'item',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')