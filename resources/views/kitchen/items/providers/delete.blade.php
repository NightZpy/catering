@extends('layouts.modal.delete')

@section('submit')
	'provider', 'delete'
@stop

@section('modal-delete-title')
Delete Provider Associate to <strong>{{ $item->name }}</strong>!
@stop