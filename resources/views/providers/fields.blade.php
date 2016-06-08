<validator name="validation">			
	<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    <label for="code">Code:</label>
    <input type="text" class="form-control" v-model="row.code" v-validate:code="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.code.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" v-model="row.name" v-validate:name="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.name.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Specialty Field -->
<div class="form-group col-sm-6">
    <label for="specialty">Specialty:</label>
    <input type="text" class="form-control" v-model="row.specialty" v-validate:specialty="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.specialty.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- District Field -->
<div class="form-group col-sm-6">
    <label for="district">District:</label>
    <input type="text" class="form-control" v-model="row.district" v-validate:district="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.district.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" v-model="row.phone" v-validate:phone="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.phone.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Movil1 Field -->
<div class="form-group col-sm-6">
    <label for="movil1">Movil1:</label>
    <input type="text" class="form-control" v-model="row.movil1" v-validate:movil1="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.movil1.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Movil2 Field -->
<div class="form-group col-sm-6">
    <label for="movil2">Movil2:</label>
    <input type="text" class="form-control" v-model="row.movil2" v-validate:movil2="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.movil2.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Contact Field -->
<div class="form-group col-sm-6">
    <label for="contact">Contact:</label>
    <input type="text" class="form-control" v-model="row.contact" v-validate:contact="{ $VALIDATION_RULES$ }" data-type="text" />
    <div v-if="$validation.contact.invalid" class="alert alert-danger" role="alert">
	$VALIDATION_MESSAGES$	
	</div>
</div>	

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::date('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    {!! Form::date('deleted_at', null, ['class' => 'form-control']) !!}
</div>			
</validator>	
