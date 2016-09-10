<validator name="validation">	
	<!-- Recipe Type Id Field -->
	<div class="form-group col-sm-6">
	    <label for="type_id">Tipo de receta:</label>
		<select class="form-control" v-model="row.type_id" v-validate:type_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione un tipo --</option>
			<option v-for="(id, name) in foreignData.typeOptions" v-bind:value="id">	
				@{{ name }}
			</option>
		</select>
	    <div v-if="$validation.type_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.type_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				El código es obligatorio
			</div>
		</div>    
	</div>				

	<!-- Name Field -->
	<div class="form-group col-sm-6">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128{{-- , unique: base_recipes --}} }" data-type="text" />
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

	<!-- Servings Quantity Field -->
	<div class="form-group col-sm-6">
	    <label for="servings_quantity">Raciones:</label>
	    <input type="number" class="form-control" v-model="row.servings_quantity" v-validate:servings_quantity="{ {{-- numeric, --}} minlength: 1, maxlength: 4 }" data-type="text" />
	    <div v-if="$validation.servings_quantity.invalid" class="alert alert-danger" role="alert">
			{{-- <div v-if="$validation.servings_quantity.numeric">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(numeric) Message Here
			</div> --}}
			<div v-if="$validation.servings_quantity.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.servings_quantity.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>	

	<!-- Description Field -->
	<div class="form-group col-sm-6">
	    <label for="description">Description:</label>
	    <textarea class="form-control" v-model="row.description" v-validate:description="{ minlength: 1, maxlength: 1024 }" data-type="text">
	    </textarea>
	    <div v-if="$validation.description.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.description.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.description.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>
</validator>