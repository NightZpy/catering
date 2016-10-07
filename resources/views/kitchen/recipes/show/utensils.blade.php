<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Unidades por 100</th>
				<th>Costo</th>
				<th>Costo total</th>
			</tr>
		</thead>
		<tbody>
			<template v-for="utensil in row.utensils">
				<tr>
					<td>@{{ utensil.code }}</td>
					<td>@{{ utensil.name }}</td>
					<td>@{{ utensil.stock }}</td>
					<td>@{{ utensil.units_x_100 }}</td>
					<td>@{{ utensil.cost_format }}</td>
					<td>@{{ utensil.total_cost_format }}</td>
				</tr>
			</template>
		</tbody>
	</table>
</div>