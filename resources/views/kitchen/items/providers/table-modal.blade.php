@extends('layouts.modal.relation-table')

@section('modal-relation-table-title')
Add Provider to Item Form
@stop

@section('modal-sync')
providers
@stop

@section('modal-close')
	'providers'
@stop

@section('model')
Provider
@stop

@section('modal-relation-table-content')
	@include('kitchen.items.providers.table')
@stop