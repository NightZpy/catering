<validator name="validationProvider">			
	<!-- Price Field -->
	<div class="form-group col-sm-6">
	    <label for="price">Precio:</label>
	    <input type="text" class="form-control" v-model="row.provider.price" v-validate:price="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationProvider.price.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationProvider.price.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validationProvider.price.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
			<div v-if="$validationProvider.price.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationProvider.price.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>	

	<!-- Selected Provider Field -->
	<div class="form-group col-sm-12">
		<label for="selected">¿Seleccionar este proveedor?</label>
		<div class="btn-group">
			<label class="btn btn-default">
				<input type="radio" id="selected" value="1" v-model="row.provider.selected" v-validate:selected="{ required: true }"> Si
			</label>
			<label class="btn btn-default">
				<input type="radio" id="selected" value="0" v-model="row.provider.selected" v-validate:selected> No
			</label>
		</div>
		<div v-if="$validationProvider.selected.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationProvider.selected.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
		</div>
	</div>

	<!-- Provider Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.kitchen.items.providers.available-providers') }}/' + row.id, 'providerOptions', 'provider')" class="form-group col-sm-6">
	    <label for="provider_id">Proveedor:</label>
		{{-- <v-select></v-select> --}}
		<select class="form-control" v-model="row.provider.provider_id" v-validate:provider_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione un proveedor --</option>
			<option v-for="option in foreignData.providerOptions" v-bind:value="option.id">		
				@{{ option.name }}
			</option>
		</select>
	    <div v-if="$validationProvider.provider_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationProvider.provider_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La familia es obligatoria
			</div>
		</div> 
	</div>			
</validator>	
