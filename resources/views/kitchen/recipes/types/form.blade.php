@extends('layouts.modal.form')

@section('modal-form-title')
RecipeType Form
@stop

@section('modal-form-content')
	@include('kitchen.recipes.types.fields')
@stop