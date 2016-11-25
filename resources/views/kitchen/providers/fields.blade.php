<validator name="validation">			
	<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ required: true, minlength: 1, maxlength: 128{{-- , unique: providers --}} }" data-type="text" />
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

<!-- Specialty Field -->
<div class="form-group col-sm-6">
    <label for="specialty">Specialty:</label>
    <input type="text" class="form-control" v-model="row.specialty" v-validate:specialty="{ required: true, minlength: 1, maxlength: 128 }" data-type="text" />
    <div v-if="$validation.specialty.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.specialty.required">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(required) Message Here
		</div>
		<div v-if="$validation.specialty.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.specialty.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>
	
	</div>
</div>	

<!-- District Field -->
<div class="form-group col-sm-6">
    <label for="district">District:</label>
    <input type="text" class="form-control" v-model="row.district" v-validate:district="{ minlength: 1, maxlength: 128 }" data-type="text" />
    <div v-if="$validation.district.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.district.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.district.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>
	
	</div>
</div>	

<!-- Address Field -->
<div class="form-group col-sm-6">
    <label for="address">Address:</label>
    <textarea class="form-control" v-model="row.address" v-validate:address="{ minlength: 12, maxlength: 512 }" data-type="text">
    </textarea>
    <div v-if="$validation.address.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.address.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.address.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>
	
	</div>
</div>	

<!-- Phone Field -->
<div class="form-group col-sm-6">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" v-model="row.phone" v-validate:phone="{ required: true, {{-- numeric, --}} minlength: 7, maxlength: 20 }" data-type="text" />
    <div v-if="$validation.phone.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.phone.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
		{{-- <div v-if="$validation.phone.numeric">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(numeric) Message Here
		</div> --}}
		<div v-if="$validation.phone.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.phone.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>
	</div>
</div>	

<!-- Movil1 Field -->
<div class="form-group col-sm-6">
    <label for="movil1">Movil1:</label>
    <input type="text" class="form-control" v-model="row.movil1" v-validate:movil1="{ numeric:true, minlength: 7, maxlength: 20 }" data-type="text" />
    <div v-if="$validation.movil1.invalid" class="alert alert-danger" role="alert">
		<div v-if="$validation.movil1.numeric">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(numeric) Message Here
		</div>
		<div v-if="$validation.movil1.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.movil1.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>	
	</div>
</div>	

<!-- Movil2 Field -->
<div class="form-group col-sm-6">
    <label for="movil2">Movil2:</label>
    <input type="text" class="form-control" v-model="row.movil2" v-validate:movil2="{ numeric:true, minlength: 7, maxlength: 20 }" data-type="text" />
    <div v-if="$validation.movil2.invalid" class="alert alert-danger" role="alert">
		<div v-if="$validation.movil2.numeric">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(numeric) Message Here
		</div>
		<div v-if="$validation.movil2.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.movil2.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>	
	</div>
</div>	

<!-- Contact Field -->
<div class="form-group col-sm-6">
    <label for="contact">Contact:</label>
    <input type="text" class="form-control" v-model="row.contact" v-validate:contact="{ minlength: 1, maxlength: 128 }" data-type="text" />
    <div v-if="$validation.contact.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validation.contact.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.contact.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>
	
	</div>
</div>	

<!-- Email Field -->
<div class="form-group col-sm-6">
    <label for="email">Email:</label>
    <input type="email" class="form-control" v-model="row.email" v-validate:email="{ required: true, email: true, minlength: 3, maxlength: 128{{-- , unique: providers --}} }" data-type="email" />
    <div v-if="$validation.email.invalid" class="alert alert-danger" role="alert">
		<div v-if="$validation.email.required">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(email) Message Here
		</div>
		<div v-if="$validation.email.email">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(email) Message Here
		</div>
		<div v-if="$validation.email.minlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(minlength) Message Here
		</div>
		<div v-if="$validation.email.maxlength">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(maxlength) Message Here
		</div>
		{{-- <div v-if="$validation.email.unique">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			Custom rule(unique) Message Here
		</div> --}}
	
	</div>
</div>				
</validator>	
