@extends('layouts.modal.form')

@section('modal-form-title')
UtensilCategory Form
@stop

@section('modal-form-content')
	@include('kitchen.utensils.categories.fields')
@stop