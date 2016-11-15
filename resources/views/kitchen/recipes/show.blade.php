@extends('layouts.modal.show', ['content' => true, 'width' => 1200, 'large' => 'large'])

@section('modal-show-title')
{{ trans('recipes.template.form-show-title') }}
@stop

@push('styles')
    <link rel="stylesheet" href="/app/css/custom/recipe/show.css">
@endpush

@section('content-show')
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs pull-right tabs-show">
			<li class="active"><a href="#list" data-toggle="tab">{{ trans('recipes.show.labels.list') }}</a></li>
			<li><a href="#utensils" data-toggle="tab">{{ trans('recipes.show.labels.Utensils') }}</a></li>
			<li><a href="#description" data-toggle="tab">{{ trans('recipes.show.labels.Description') }}</a></li>
			<li class="pull-left header"><i class="fa fa-th"></i> <strong>{{ trans('recipes.show.labels.Recipe') }}: </strong>@{{ row.name }}</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="list">
				@include('kitchen.recipes.show.list')
			</div>
			<!-- /.tab-pane -->
			<div class="tab-pane" id="utensils">
				@include('kitchen.recipes.show.utensils')
			</div>
			<!-- /.tab-pane -->
			<div class="tab-pane" id="description">
				@include('kitchen.recipes.show.description')
			</div>
			<!-- /.tab-pane -->
		</div>
		<!-- /.tab-content -->
	</div>
@stop