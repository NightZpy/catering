<validator name="validationBase">	
	<!-- required_quantity Field -->
	<div class="form-group col-sm-6">
	    <label for="required_quantity">Cantidad requerida:</label>
	    <input type="text" class="form-control" v-model="row.pivot_base.required_quantity" v-validate:required_quantity="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationBase.required_quantity.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationBase.required_quantity.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validationBase.required_quantity.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationBase.required_quantity.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>

	<!-- base Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.kitchen.recipes.base-recipes.available') }}/' + row.id, 'baseOptions', 'base')" class="form-group col-sm-6">
	    <label for="base_id">Receta base:</label>
		<select class="form-control" v-model="row.pivot_base.base_id" v-validate:base_id="{ required: true }">
			<option selected="selected">-- Seleccione una receta base --</option>
			<option v-for="base in foreignData.baseOptions" 
				v-bind:selected="base.id == row.base.id"
				v-bind:value="base.id">		
				@{{ base.name }} - @{{ base.type_name }}
			</option>
		</select>
	    <div v-if="$validationBase.base_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationBase.base_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La receta base es obligatoria
			</div>
		</div> 
	</div>	

	<!-- Cost Field -->
	<div class="form-group col-sm-6">
	    <label for="cost">Costo: @{{ row.pivot_base.cost }}</label>
	    <input
	    	style="background-color: yellow; font-weight: bold" 
	    	type="text" 
	    	class="form-control" 
	    	v-model="row.pivot_base.cost"
	    	data-type="text" />
	</div>			
</validator>	
