@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('presentations.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('presentations.fields')
@stop