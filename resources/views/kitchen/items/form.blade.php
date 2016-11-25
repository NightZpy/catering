@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('store.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('kitchen.items.fields')
@stop