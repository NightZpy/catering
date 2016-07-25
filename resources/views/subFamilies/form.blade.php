@extends('layouts.modal.form')

@section('modal-form-title')
SubFamily Form
@stop

@section('modal-form-content')
	@include('subFamilies.fields')
@stop