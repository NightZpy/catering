@extends('layouts.modal.form')

@section('modal-form-title')
{{ trans('subfamilies.template.form-add-title') }}
@stop

@section('modal-form-content')
	@include('subFamilies.fields')
@stop