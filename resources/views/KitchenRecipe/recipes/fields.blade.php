<validator name="validation">			
	<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, min: 1, max: 128, unique: recipes }" data-type="text" />
    <div v-if="$validation.name.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.name.required">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(required) Message Here
		</div>
		<div v-if="$validation.name.min">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(min) Message Here
		</div>
		<div v-if="$validation.name.max">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(max) Message Here
		</div>
		<div v-if="$validation.name.unique">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(unique) Message Here
		</div>
	
	</div>
</div>	

<!-- Servings Quantity Field -->
<div class="form-group col-sm-6">
    <label for="servings_quantity">Servings Quantity:</label>
    <input type="number" class="form-control" v-model="row.servings_quantity" v-validate:servings_quantity="{ numeric, min: 1, max: 4 }" data-type="text" />
    <div v-if="$validation.servings_quantity.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.servings_quantity.numeric">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(numeric) Message Here
		</div>
		<div v-if="$validation.servings_quantity.min">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(min) Message Here
		</div>
		<div v-if="$validation.servings_quantity.max">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(max) Message Here
		</div>
	
	</div>
</div>	

<!-- Description Field -->
<div class="form-group col-sm-6">
    <label for="description">Description:</label>
    <textarea class="form-control" v-model="row.description" v-validate:description="{ min: 1, max: 1024 }" data-type="text">
    </textarea>
    <div v-if="$validation.description.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.description.min">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(min) Message Here
		</div>
		<div v-if="$validation.description.max">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(max) Message Here
		</div>
	
	</div>
</div>	

<!-- Recipe Type Id Field -->
<div class="form-group col-sm-6">
    <label for="recipe_type_id">Recipe Type Id:</label>
	<select v-model="row.recipe_type_id" v-validate:recipe_type_id="{ required: true, minlength: 3, maxlength: 128 }">
		<option v-for="option in options" v-bind:value="option.value">
			@{{ option.text }}
		</option>
	</select>
    <div v-if="$validation.recipe_type_id.invalid" class="alert alert-danger" role="alert">
		<div v-if="$validation.recipe_type_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			El código es obligatorio
		</div>
		<div v-if="$validation.recipe_type_id.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Longitud mínima erronea					
		</div>
	</div>    
</div>			
</validator>	
