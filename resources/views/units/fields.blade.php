<validator name="validation">			
	<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, min: 1, max: 128, unique: units }" data-type="text" />
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

<!-- Symbol Field -->
<div class="form-group col-sm-6">
    <label for="symbol">Symbol:</label>
    <input type="text" class="form-control" v-model="row.symbol" v-validate:symbol="{ min: 1, max: 128, unique: units }" data-type="text" />
    <div v-if="$validation.symbol.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.symbol.min">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(min) Message Here
		</div>
		<div v-if="$validation.symbol.max">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(max) Message Here
		</div>
		<div v-if="$validation.symbol.unique">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(unique) Message Here
		</div>
	
	</div>
</div>				
</validator>	
