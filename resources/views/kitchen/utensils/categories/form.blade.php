@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('utensilsCategory.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.utensils.categories.fields')
@stop