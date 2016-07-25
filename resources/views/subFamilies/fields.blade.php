<validator name="validation">			
	<!-- Name Field -->
	<div class="form-group col-sm-6">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128{{--, unique: checkUnique('{{ route('api.v1.families.check-unique', 'name') }}') --}} }" data-type="text" />
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
			<div v-if="$validation.name.maxlength	">
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

	<!-- Code Field -->
	<div class="form-group col-sm-6">
	    <label for="code">Code:</label>
	    <input type="text" class="form-control" v-model="row.code" v-validate:code="{ required: true, minlength: 1, maxlength	: 10{{-- , unique: families --}} }" data-type="text" />
	    <div v-if="$validation.code.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validation.code.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validation.code.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validation.code.maxlength	">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
			{{-- <div v-if="$validation.code.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
	
		</div>
	</div>	

	<!-- Family Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.families.index') }}/', 'familyOptions')" class="form-group col-sm-6">
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
</validator>	
