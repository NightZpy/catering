@extends('layouts.modal.relation-form')

@section('modal-relation-form-title')
Add Provider to Item Form
@stop

@section('modal-sync')
localModals.addProviderToItem
@stop

@section('modal-relation-form-content')
	@include('kitchen.items.providers.fields')
@stop