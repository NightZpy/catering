@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('baseRecipes.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.recipes.bases.fields')
@stop