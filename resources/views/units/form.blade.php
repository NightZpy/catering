@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('units.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('units.fields')
@stop