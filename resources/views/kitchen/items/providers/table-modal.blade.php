@extends('layouts.modal.relation-table')

@section('modal-relation-table-title')
Fromulario Agregar Proveedor a Artículo 
@stop

@section('modal-sync')
Proveedores
@stop

@section('modal-close')
	'providers'
	'proveedores'
@stop

@section('model')
Proveedor
@stop

@section('modal-relation-table-content')
	@include('kitchen.items.providers.table')
@stop