<?php
	extract([
            'modalTitle'    => 'Delete Provider ({{ row.provider.name }}) associate to <em>' . $item->name . '</em>!',
            'modalSync'     => 'providerDELETE',
            'modalClose'    => 'providerDELETE',
            'model'         => 'Provider',
            'related'       => 'provider',
            'type'			=> 'delete'
	]);
?>

@include('layouts.modal.relation-delete')