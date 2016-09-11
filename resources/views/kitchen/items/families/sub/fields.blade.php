<validator name="validationSubFamily">			
	<!-- Name Field -->
	<div class="form-group col-sm-6">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" v-model="row.subFamily.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128{{--, unique: checkUnique('{{ route('api.v1.families.check-unique', 'name') }}') --}} }" data-type="text" />
	    <div v-if="$validationSubFamily.name.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validationSubFamily.name.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validationSubFamily.name.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationSubFamily.name.maxlength	">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
			{{-- <div v-if="$validationSubFamily.name.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
		
		</div>
	</div>	

	<!-- Family Id Field -->
	<div class="form-group col-sm-6" class="form-group col-sm-6">
	    <label for="family_id">Familia:</label>
		<select class="form-control" v-model="row.subFamily.family_id" v-validate:family_id="{ required: true }">
			<option value="" selected="selected">-- Seleccione una familia --</option>
			<option v-for="(id, name) in foreignData.familyOptions" v-bind:value="id">
				@{{ name }}
			</option>
		</select>
	    <div v-if="$validationSubFamily.family_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationSubFamily.family_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				La familia es obligatoria
			</div>
		</div> 
	</div>
</validator>	
