<template v-if="row.items && row.items.length > 0">
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
					<th>Nombre</th>
					<th>Unidad</th>
					<th>Cantidad compra</th>
					<th>Costo por cantidad</th>
					<th>Merma</th>
					<th>Cant. Racion</th>
					<th>Cant. Total</th>
					<th>Costo</th>
				</tr>
				<template v-for="item in row.items">
					<tr>
					 	<td>@{{ item.code }}</td>
					 	<td>@{{ item.name + ' - ' + item.type }}</td>
					 	<td>@{{ item.unit.symbol }}</td>
					 	<td>@{{ item.current_stock }}</td>
					 	<td>@{{ item.cost_format }}</td>
					 	<td>@{{ item.pivot.decrease }}</td>
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
</template>
<template v-else>
	<h1>No hay insumos asociados</h1>
</template>