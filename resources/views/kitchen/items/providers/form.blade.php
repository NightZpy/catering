@extends('layouts.modal.relation-form')

@section('modal-relation-form-title')
Add Provider to Item Form
@stop

@section('modal-sync')
addProviderToItem
@stop

@section('modal-close')
	'addProviderToItem'
@stop

@section('model')
Provider
@stop

@section('related')
	'provider'
@stop

@section('modal-relation-form-content')
	@include('kitchen.items.providers.fields')
@stop