@extends('layouts.modal.form')

@section('modal-form-title')
Provider Form
@stop

@section('modal-form-content')
	@include('kitchen.providers.fields')
@stop