@extends('layouts.modal.form')

@section('modal-form-title')
InputMaterial Form
@stop

@section('modal-form-content')
	@include('inputMaterials.fields')
@stop