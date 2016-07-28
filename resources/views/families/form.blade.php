@extends('layouts.modal.form')

@section('modal-form-title')
Family Form
@stop

@section('modal-form-content')
	@include('families.fields')
@stop