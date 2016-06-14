@extends('layouts.modal.form')

@section('modal-form-title')
Presentation Form
@stop

@section('modal-form-content')
	@include('presentations.fields')
@stop