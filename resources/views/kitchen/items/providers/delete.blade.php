<?php
	extract([
            'modalTitle'    => 'Eliminar Proveedor ({{ row.provider.name }}) asociado a <em>' . $item->name . '</em>!',
            'modalSync'     => 'providerDELETE',
            'modalClose'    => 'providerDELETE',
            'model'         => 'Provider',
            'related'       => 'provider',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')