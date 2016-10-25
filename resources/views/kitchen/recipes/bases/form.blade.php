@extends('layouts.modal.form')

@section('modal-form-title')
BaseRecipe Form
@stop

@section('modal-form-content')
	@include('kitchen.recipes.bases.fields')
@stop