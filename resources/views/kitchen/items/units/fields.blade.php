<validator name="validationUnit">			
	<!-- Name Field -->
	<div class="form-group col-sm-6">
	    <label for="name">Name:</label>
	    <input type="text" class="form-control" v-model="row.unit.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128{{-- , unique: units --}} }" data-type="text" />
	    <div v-if="$validationUnit.name.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validationUnit.name.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			<div v-if="$validationUnit.name.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationUnit.name.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
			{{-- <div v-if="$validationUnit.name.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
		
		</div>
	</div>	

	<!-- Symbol Field -->
	<div class="form-group col-sm-6">
	    <label for="symbol">Symbol:</label>
	    <input type="text" class="form-control" v-model="row.unit.symbol" v-validate:symbol="{ minlength: 1, maxlength: 128{{-- , unique: units --}} }" data-type="text" />
	    <div v-if="$validationUnit.symbol.invalid" class="alert alert-danger" role="alert">
				<div v-if="$validationUnit.symbol.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationUnit.symbol.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
			{{-- <div v-if="$validationUnit.symbol.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
		
		</div>
	</div>				
</validator>	