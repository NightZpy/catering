<template v-if="row.pivot_base.length > 0">
	<div class="table-responsive">
		<table class="table table-xls-main-title">
			<thead>
				<tr>
					<th colspan="3">Receta:</th>
					<td>@{{ row.name }}</td>
					<th>Código:</th>
					<td>@{{ row.code }}</td>
					<th></th>
					<th class="text-right">Raciones:</th>
					<td colspan="2">@{{ row.servings_quantity }}</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="3">Tipo:</th>
					<td>@{{ row.type_name }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th class="text-center" colspan="4">Ingredientes</th>
					<th class="text-center" colspan="4">Utilización en receta final</th>
					<th></th>	
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
				<tr>
					<td style="background-color: white" colspan="4"></td>
					<th>Peso total</th>
					<td>@{{ row.total_weight_format }}</td>
					<th colspan="2">Costo MP X Receta</th>
					<td colspan="2">@{{ row.cost_mp_x_recipe_format }}</td>
				</tr>
				<tr>
					<td style="background-color: white" colspan="6"></td>
					<th colspan="2">Costo MP X Ración</th>
					<td colspan="2">@{{ row.cost_mp_x_ration_format }}</td>
				</tr>
			</tbody>
		</table>
	</div>	
</template>
<template v-else>
	<h1>No hay recetas base asociadas</h1>
</template>