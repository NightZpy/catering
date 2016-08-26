@extends('layouts.modal.relation-table')

@section('modal-relation-table-title')
Add item to BaseRecipe Form
@stop

@section('modal-sync')
items
@stop

@section('modal-close')
	'items'
@stop

@section('model')
item
@stop

@section('modal-relation-table-content')
	@include('kitchen.items.items.table')
@stop