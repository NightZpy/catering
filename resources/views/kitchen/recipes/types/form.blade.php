@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('recipeType.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.recipes.types.fields')
@stop