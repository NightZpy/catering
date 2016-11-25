@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('recipes.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.recipes.fields')
@stop