@extends('layouts.modal.form')

@section('modal-form-title')
Item Form
@stop

@section('modal-form-content')
	@include('kitchen.items.fields')
@stop