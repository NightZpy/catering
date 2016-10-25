<validator name="validation">			
	<!-- Name Field -->
	<div class="form-group col-sm-6">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128{{-- , unique: utensils --}} }" data-type="text" />
	    <div v-if="$validation.name.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.name.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validation.name.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.name.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
			{{-- <div v-if="$validation.name.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
		
		</div>
	</div>	

	<!-- Stock Field -->
	<div class="form-group col-sm-6">
	    <label for="stock">Stock:</label>
	    <input type="text" class="form-control" v-model="row.stock" v-validate:stock="{ required: true{{-- , numeric --}}, minlength: 0 }" data-type="text" />
	    <div v-if="$validation.stock.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.stock.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validation.stock.numeric">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(numeric) Message Here
			</div> --}}
			<div v-if="$validation.stock.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
		
		</div>
	</div>	

	<!-- Stock Field -->
	<div class="form-group col-sm-6">
	    <label for="cost">Cost:</label>
	    <input type="text" class="form-control" v-model="row.cost" v-validate:cost="{ required: true{{-- , numeric --}}, minlength: 1, maxlength: 10 }" data-type="text" />
	    <div v-if="$validation.cost.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.cost.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validation.cost.numeric">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(numeric) Message Here
			</div> --}}
			<div v-if="$validation.cost.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.cost.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		</div>
	</div>	

	<!-- Units_x_100 Field -->
	<div class="form-group col-sm-6">
	    <label for="units_x_100">Un. por 100 pers:</label>
	    <input type="text" class="form-control" v-model="row.units_x_100" v-validate:units_x_100="{ required: true{{-- , numeric --}}, minlength: 1, maxlength: 10 }" data-type="text" />
	    <div v-if="$validation.units_x_100.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.units_x_100.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validation.units_x_100.numeric">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(numeric) Message Here
			</div> --}}
			<div v-if="$validation.units_x_100.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.units_x_100.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		</div>
	</div>

	<!-- Category Id Field -->
	<div class="form-group col-sm-6">
	    <label for="category_id">Categoria:</label>
		{{-- <v-select
			v-validate:category_id="{ required: true }"
			:options="objectToArrayObject(foreignData.utensilCategoriesOptions)"
			placeholder="Seleccione una categoría"
			:value.sync="row.category_id"
			search justified required  clear-button  close-on-select>
		</v-select> --}}
		<select class="form-control" v-model="row.category_id" v-validate:category_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione presentacion --</option>
			<option v-for="(id, name) in foreignData.utensilCategoriesOptions" v-bind:value="id">
				@{{ name }}
			</option>
		</select>
	    <div v-if="$validation.category_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.category_id.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La categoría es obligatoria
			</div>
		</div>    
	</div>			
</validator>
