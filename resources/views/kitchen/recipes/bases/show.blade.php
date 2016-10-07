@extends('layouts.modal.show', ['content' => true, 'width' => 1200, 'large' => 'large'])

@section('modal-show-title')
Recipe
@stop

@section('styles')
<style>
	.table-xls-main-title > thead,
	.table-xls-main-title > tbody > tr:nth-child(2) > th:last-child,
	.table-xls-main-title > tbody > tr:nth-child(n+3) > td:last-child,
	.table-xls-main-title > tfoot {
		background-color: rgb(60, 141, 188);
		color: white;
 		text-align:center;
    	vertical-align:middle;		
	}

	.table-xls-main-title > tbody > tr:nth-child(1) > th:nth-child(-n+3),
	.table-xls-main-title > tbody > tr:nth-child(2) > th:nth-child(-n+9) {
		background-color: rgb(157, 198, 221);
 		text-align:center;
    	vertical-align:middle;	
    	color: white;		
	}	

	.table-xls-main-title > tfoot > tr > td:nth-child(1) {
		background-color: white;
	}	

	.table-xls-main-title > thead > tr > td,
	.table-xls-main-title > tbody > tr > td {
		font-style: oblique;
	}	


	/*.table-xls-main-title > tbody > tr:nth-child(n+4) > td:nth-child(-n+6) {
		border-bottom: 2px solid rgb(157, 198, 221);
	}

	.table-xls-main-title > tbody > tr:nth-last-child(-n+3) {
		border-bottom: 1px solid white;
	}*/

	.table-xls-main-title > thead > tr > td:nth-child(n+1),
	.table-xls-main-title > thead > tr > th:nth-child(n+1) {
		vertical-align:middle;
	}

	.table-xls-main-title > thead > tr > td:nth-child(n+1) {
		text-align: left;
	}

	.table-xls-main-title > thead > tr > th:nth-child(n+1) {
		text-align: right;
	}

</style>
@stop

@section('content-show')
	<div class="table-responsive">
		<table class="table table-xls-main-title">
			<thead>
				<tr>
					<th>Receta:</th>
					<td>@{{ row.name }}</td>
					<th>Tipo:</th>
					<td>@{{ row.type_name }}</td>
					<th>Código:</th>
					<td>@{{ row.code }}</td>
					<td></td>
					<th class="text-right">Raciones:</th>
					<td>@{{ row.servings_quantity }}</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="2">Ingredientes</th>
					<th colspan="4">Costo insumos</th>
					<th colspan="3">Consumo</th>
					<th></th>
				</tr>
				<tr>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Unidad</th>
					<th>Cantidad compra</th>
					<th>Costo por cantidad</th>
					<th>Merma</th>
					<th>Unidad</th>
					<th>Cant. Racion</th>
					<th>Cant. Total</th>
					<th>Costo</th>
				</tr>
				<template v-for="item in row.items">
					<tr>
					 	<td>@{{ item.code }}</td>
					 	<td>@{{ item.description }}</td>
					 	<td>@{{ item.unit.symbol }}</td>
					 	<td>@{{ item.pivot.purchase_quantity }}</td>
					 	<td>@{{ item.pivot.cost_per_quantity_format }}</td>
					 	<td>@{{ item.pivot.decrease }}</td>
					 	<td>@{{ item.unit.symbol }}</td>
					 	<td>@{{ item.pivot.servings_quantity }}</td>
					 	<td>@{{ item.pivot.total_quantity_format }}</td>
					 	<td>@{{ item.pivot.cost_format }}</td>
					 </tr>
				</template>				 
			</tbody>
			<tfoot>
				<tr>
					<td colspan="7"></td>
					<th colspan="2">Costo MP X Receta</th>
					<td>@{{ row.cost_mp_x_recipe_format }}</td>					
				</tr>
				<tr>
					<td colspan="7"></td>
					<th colspan="2">Costo MP X Ración</th>
					<td>@{{ row.cost_mp_x_ration_format }}</td>					
				</tr>
			</tfoot>
		</table>
	</div>
@stop