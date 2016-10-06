@extends('layouts.modal.show', ['content' => true, 'width' => 1200, 'large' => 'large'])

@section('modal-show-title')
Recipe
@stop

@section('content-show')
	{{-- <div class="row">
		<div class="col-sm-5">
			Nombre de la receta: <strong>@{{ row.name }}</strong>
		</div>
		<div class="col-sm-3">
			Código: <strong>@{{ row.code }}</strong>
		</div>
		<div class="col-sm-offset-1 col-sm-3">
			N. Raciones: <strong>@{{ row.servings_quantity }}</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-5">Tipo de receta: <strong>@{{ row.type_name }}</strong></div>
	</div>
	<div class="row">
		<div class="col-sm-5">
		Ingredientes
			<div class="col-sm-4">
				Código
				<div class="col-sm-12">aaaaaaaaaaaaa</div>
				<div class="col-sm-12">aaaaaaaaaaaaa</div>
			</div>				
			<div class="col-sm-8">
				Descripción
				<div class="col-sm-12">bbbbbbbbbbbbbb</div>
				<div class="col-sm-12">bbbbbbbbbbbbbb</div>
			</div>
		</div>
		<div class="col-sm-5">Utilización en receta final</div>
	</div> --}}	
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th style="background-color: rgb(255, 255, 204)" colspan="3">Nombre de la receta:</th>
				<td style="background-color: rgb(255, 255, 204)">@{{ row.name }}</td>
				<th>Código:</th>
				<td>@{{ row.code }}</td>
				<th></th>
				<th class="text-right">Raciones:</th>
				<td colspan="2">@{{ row.servings_quantity }}</td>
			</thead>
			<tbody>
				<tr>
					<th style="background-color: rgb(255, 255, 204)" colspan="3">Tipo de receta:</th>
					<td style="background-color: rgb(255, 255, 204)">@{{ row.type_name }}</td>
				</tr>
				<tr>
					<th class="text-center" colspan="4">Ingredientes</th>
					<th class="text-center" colspan="4">Utilización en receta final</th>
				</tr>
				<tr>
					<th class="text-center">Código</th>
					<th class="text-center" colspan="3">Descripción</th>
					<th></th>
					<th class="text-center">Peso de 1 ración</th>
					<th class="text-center">Costo por 1 ración</th>
					<th class="text-center">Cantidad requerida</th>
					<th colspan="2" class="text-center">Costo</th>
				</tr>
				<template v-for="pivot in row.pivot_base">
					<tr>
						<template v-for="baseD in row.bases">
							<template v-if="baseD.id == pivot.pivot.base_id">
								<td>@{{ baseD.code }}</td>
								<td colspan="3">@{{ baseD.description }}</td>								
							</template>
						</template>
						<td></td>
						<td>@{{ pivot.pivot.ration_weight_format }}</td>
						<td>@{{ pivot.pivot.ration_cost_format }}</td>
						<td>@{{ pivot.pivot.required_quantity }}</td>
						<td colspan="2">@{{ pivot.pivot.cost_format }}</td>
					</tr>
				</template>
				<tr style="background-color: rgb(204, 255, 255)">
					<td style="background-color: white" colspan="4"></td>
					<th>Peso total</th>
					<td>@{{ row.total_weight_format }}</td>
					<th colspan="2">Costo MP X Receta</th>
					<td colspan="2">@{{ row.cost_mp_x_recipe_format }}</td>
				</tr>
				<tr style="background-color: rgb(204, 255, 255)">
					<td style="background-color: white" colspan="6"></td>
					<th colspan="2">Costo MP X Ración</th>
					<td colspan="2">@{{ row.cost_mp_x_ration_format }}</td>
				</tr>
			</tbody>
		</table>
	</div>

@stop