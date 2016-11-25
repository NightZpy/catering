@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('providers.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.providers.fields')
@stop