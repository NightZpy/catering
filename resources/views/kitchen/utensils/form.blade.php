@extends('layouts.modal.form')

@section('modal-form-title')
Utensil Form
@stop

@section('modal-form-content')
	@include('kitchen.utensils.fields')
@stop