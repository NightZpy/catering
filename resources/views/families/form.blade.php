@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('families.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('families.fields')
@stop