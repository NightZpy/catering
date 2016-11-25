@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('utensils.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.utensils.fields')
@stop