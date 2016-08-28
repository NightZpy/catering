@extends('layouts.modal.form')

@section('modal-form-title')
Recipe Form
@stop

@section('modal-form-content')
	@include('KitchenRecipe.recipes.fields')
@stop