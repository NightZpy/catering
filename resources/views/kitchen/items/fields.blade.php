<validator name="validation">			
	<!-- Name Field -->
	<div class="form-group col-sm-6">
	    <label for="name">Nombre:</label>
	    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128 }" data-type="text" />
	    <div v-if="$validation.name.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.name.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validation.name.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
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
		
		</div>
	</div>	

	<!-- Auto Provider Field -->
	<div class="form-group col-sm-12">
		<label for="auto_provider">Auto Proveedor:</label>
		<div class="btn-group">
			<label class="btn btn-default">
				<input type="radio" id="auto_provider" value="1" v-model="row.auto_provider" v-validate:auto_provider="{ required: true }"> Si
			</label>
			<label class="btn btn-default">
				<input type="radio" id="auto_provider" value="0" v-model="row.auto_provider" v-validate:auto_provider> No
			</label>
		</div>
		<div v-if="$validation.auto_provider.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.auto_provider.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
		</div>
	</div>

	<!-- Perishable Field -->
	<div class="form-group col-sm-12">
		<label for="perishable">Perecible:</label>
		<div class="btn-group">
			<label class="btn btn-default">
				<input type="radio" id="perishable" value="1" v-model="row.perishable" v-validate:perishable="{ required: true }"> Si
			</label>
			<label class="btn btn-default">
				<input type="radio" id="perishable" value="0" v-model="row.perishable" v-validate:perishable> No
			</label>
		</div>
		<div v-if="$validation.perishable.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.perishable.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
		</div>
	</div>

	<!-- min Stock Field -->
	<div class="form-group col-sm-6">
	    <label for="min_stock">Stock mínimo:</label>
	    <input type="number" class="form-control" v-model="row.min_stock" v-validate:min_stock="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
	    <div v-if="$validation.min_stock.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.min_stock.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validation.min_stock.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.min_stock.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		</div>
	</div>	

	<!-- current_stock Field -->
	<div class="form-group col-sm-6">
	    <label for="current_stock">Cantidad:</label>
	    <input type="number" class="form-control" v-model="row.current_stock" v-validate:current_stock="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
	    <div v-if="$validation.current_stock.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.current_stock.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validation.current_stock.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.current_stock.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>	

	<!-- to_buy Field -->
	<div class="form-group col-sm-6">
	    <label for="to_buy">Cantidad:</label>
	    <input type="number" class="form-control" v-model="row.to_buy" v-validate:to_buy="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
	    <div v-if="$validation.to_buy.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.to_buy.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validation.to_buy.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.to_buy.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>		

	<!-- Currency Field -->
	<div class="form-group col-sm-6">
	    <label for="currency">Moneda:</label>
	    <input type="text" class="form-control" v-model="row.currency" v-validate:currency="{ required: true, minlength: 1, maxlength: 128 }" data-type="text" />
	    <div v-if="$validation.currency.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.currency.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validation.currency.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.currency.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>	

	<!-- Unit Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.units.index') }}/', 'unitOptions', 'unit')" class="form-group col-sm-6">
	    <label for="unit_id">Unidad:</label>
		{{-- <v-select></v-select> --}}
		<select class="form-control" v-model="row.unit_id" v-validate:unit_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione un tipo --</option>
			<option v-for="option in foreignData.unitOptions" v-bind:value="option.id">		
				@{{ option.name }}
			</option>
		</select>
	    <div v-if="$validation.unit_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.unit_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La unidad es obligatoria
			</div>
		</div> 
	</div>

	<!-- Presentation Id Field -->
	<div @click="getForeignData('{{ route('api.v1.presentations.index') }}/', 'presentationOptions', 'presentation')" class="form-group col-sm-6">
	    <label for="presentation_id">Presentación:</label>
		{{-- <v-select></v-select> --}}
		<select class="form-control" v-model="row.presentation_id" v-validate:presentation_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione un tipo --</option>
			<option v-for="option in foreignData.presentationOptions" v-bind:value="option.id">		
				@{{ option.name }}
			</option>
		</select>
	    <div v-if="$validation.presentation_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.presentation_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La presentación es obligatoria
			</div>
		</div> 
	</div>

	<!-- Type Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.types.index') }}/', 'typeOptions', 'type')" class="form-group col-sm-6">
	    <label for="type_id">Tipo:</label>
		{{-- <v-select></v-select> --}}
		<select class="form-control" v-model="row.type_id" v-validate:type_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione un tipo --</option>
			<option v-for="option in foreignData.typeOptions" v-bind:value="option.id">		
				@{{ option.name }}
			</option>
		</select>
	    <div v-if="$validation.type_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.type_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				El tipo es obligatorio
			</div>
		</div> 
	</div>

	<!-- Family Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.families.index') }}/', 'familyOptions', 'family')" class="form-group col-sm-6">
	    <label for="family_id">Familia:</label>
		{{-- <v-select></v-select> --}}
		<select class="form-control" v-model="row.family_id" v-validate:family_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione una familia --</option>
			<option v-for="option in foreignData.familyOptions" v-bind:value="option.id">		
				@{{ option.name }}
			</option>
		</select>
	    <div v-if="$validation.family_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.family_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La familia es obligatoria
			</div>
		</div> 
	</div>

	<!-- SubFamily Id Field -->
	<div v-if="foreignData.familyOptionsCount > 0" class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.subFamilies.byFamily') }}/' + row.family_id , 'subFamilyOptions', 'subFamily')" class="form-group col-sm-6">
	    <label for="sub_family_id">Sub-Familia:</label>
		{{-- <v-select></v-select> --}}
		<select class="form-control" v-model="row.sub_family_id" v-validate:sub_family_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione una sub-familia --</option>
			<option v-for="option in foreignData.subFamilyOptions" v-bind:value="option.id">	
				@{{ option.name }}
			</option>
		</select>
	    <div v-if="$validation.sub_family_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.sub_family_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La sub-familia es obligatoria
			</div>
		</div> 
	</div>			
</validator>	
