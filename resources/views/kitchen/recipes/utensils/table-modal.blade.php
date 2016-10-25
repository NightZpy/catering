@extends('layouts.modal.relation-table')

@section('modal-relation-table-title')
Add utensil to BaseRecipe Form
@stop

@section('modal-sync')
utensils
@stop

@section('modal-close')
	'utensils'
@stop

@section('model')
utensil
@stop

@section('modal-relation-table-content')
	@include('kitchen.utensils.utensils.table')
@stop