@extends('layouts.modal.show', ['content' => true, 'width' => 1200, 'large' => 'large'])

@section('modal-show-title')
Recipe
@stop

@push('styles')
    <link rel="stylesheet" href="/app/css/custom/recipe/base-show.css">
@endpush

@section('content-show')
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs pull-right tabs-show">
			<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
			<li><a href="#utensils" data-toggle="tab">Utensilios</a></li>
			<li><a href="#description" data-toggle="tab">Descripción</a></li>
			<li class="pull-left header"><i class="fa fa-th"></i> <strong>Receta: </strong>@{{ row.name }}</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="list">
				@include('kitchen.recipes.bases.show.list')
			</div>
			<!-- /.tab-pane -->
			<div class="tab-pane" id="utensils">
				@include('kitchen.recipes.bases.show.utensils')
			</div>
			<!-- /.tab-pane -->
			<div class="tab-pane" id="description">
				@include('kitchen.recipes.bases.show.description')
			</div>
			<!-- /.tab-pane -->
		</div>
		<!-- /.tab-content -->
	</div>
@stop