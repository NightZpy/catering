<validator name="validation">
	<div class="nav-tabs-custom">	
		<ul class="nav nav-tabs">
			<li class="active"><a href="#product" data-toggle="tab" aria-expanded="true"><b><em>Producto</em></b></a></li>
			<li class=""><a href="#storage" data-toggle="tab" aria-expanded="false"><b><em>Almacenaje</em></b></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="product">
				<!-- Family Id Field -->
				<div class="form-group col-sm-6" class="form-group col-sm-6">
				    <label for="family_id">Familia:</label>
				    <div class="input-group">
						<select class="form-control" v-model="row.family_id" v-validate:family_id="{ required: true }">
							<option value="" selected="selected">-- Seleccione familia --</option>
							<option v-for="(id, name) in foreignData.familyOptions" v-bind:value="id">		
								@{{ name }}
							</option>
						</select>
						{{-- <v-select
							v-validate:family_id="{ required: true }"
							:options="objectToArrayObject(foreignData.familyOptions)"
							placeholder="Seleccione una familia"
							:value.sync="row.family_id"
							search justified required  clear-button  close-on-select>
							<v-option v-for="(id, name) in foreignData.familyOptions" :value="id">		
								@{{ name }}
							</v-option>
						</v-select> --}}
						<span class="input-group-btn">
	    					<button class="btn btn-primary" @click="modal('family_ADD_inform')">
	    						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    						</button>
	  					</span>
  					</div>
				    <div v-if="$validation.family_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.family_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La familia es obligatoria
						</div>
					</div> 
				</div>

				<!-- SubFamily Id Field -->
				<div class="form-group col-sm-6" class="form-group col-sm-6">
				    <label for="sub_family_id">Sub-Familia:</label>
				    <div class="input-group">
						<select :disabled="" class="form-control" v-model="row.sub_family_id" v-validate:sub_family_id="{ required: true }">
							<option value="foreignData.familyOptionsCount > 0" selected="selected">-- Seleccione una sub-familia --</option>
							<option v-for="option in foreignData.subFamilyOptions" v-bind:value="option.id">	
								@{{ option.name }}
							</option>
						</select>
						<span class="input-group-btn">
		    					<button class="btn btn-primary" @click="modal('subFamily_ADD_inform')">
	    						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    						</button>
	  					</span>
  					</div>
				    <div v-if="$validation.sub_family_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.sub_family_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La sub-familia es obligatoria
						</div>
					</div> 
				</div>

				<!-- Name Field -->
				<div class="form-group col-sm-6">
				    <label for="name">Nombre:</label>
				    <input type="text" class="form-control" 
				    	v-model="row.name" 
				    	v-validate:name="{ {{-- email: true, --}} required: true, minlength: 1, maxlength: 128 }" data-type="text" />
				    <div v-if="$validation.name.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.name.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						{{-- <div v-if="$validation.name.email">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							@{{ $validation.name.email }}
						</div> --}}
						{{-- <div v-if="$validation.name.unique">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(unique) Message Here
						</div> --}}
						{{-- <div v-if="$validation.name.unique">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Ya existe un Item con este nombre!
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

				<!-- Type Id Field -->
				<div class="form-group col-sm-6">
				    <label for="type">Tipo:</label>
				    <input type="text" class="form-control" v-model="row.type" v-validate:type="{ required: true, minlength: 1, maxlength: 128 }" data-type="text" />
				    <div v-if="$validation.type.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validation.type.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						{{-- <div v-if="$validation.type.unique">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(unique) Message Here
						</div> --}}
						<div v-if="$validation.type.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validation.type.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					
					</div>
				</div>

				<!-- Unit Id Field -->
				<div class="form-group col-sm-6">
				    <label for="unit_id">Unidad:</label>
					<div class="input-group">
						<select class="form-control" v-model="row.unit_id" v-validate:unit_id="{ required: true }">
							<option value="" selected="selected">-- Seleccione unidad --</option>
							<option v-for="(id, name) in foreignData.unitOptions" v-bind:value="id">	
								@{{ name }}
							</option>
						</select>
						<span class="input-group-btn">
	    					<button class="btn btn-primary" @click="modal('unit_ADD_inform')">
	    						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    						</button>
	  					</span>
  					</div>
				    <div v-if="$validation.unit_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.unit_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La unidad es obligatoria
						</div>
					</div> 
				</div>

				<!-- Presentation Id Field -->
				<div class="form-group col-sm-6">
				    <label for="presentation_id">Presentación:</label>
				    <div class="input-group">
						<select class="form-control" v-model="row.presentation_id" v-validate:presentation_id="{ required: true }">
							<option value="" selected="selected">-- Seleccione presentacion --</option>
							<option v-for="(id, name) in foreignData.presentationOptions" v-bind:value="id">
								@{{ name }}
							</option>
						</select>
						<span class="input-group-btn">
	    					<button class="btn btn-primary" @click="modal('presentation_ADD_inform')">
	    						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    						</button>
	  					</span>
  					</div>
				    <div v-if="$validation.presentation_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.presentation_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La presentación es obligatoria
						</div>
					</div> 
				</div>	              
			</div>
			<div class="tab-pane" id="storage">
				<!-- min Stock Field -->
				<div class="form-group col-sm-6">
				    <label for="decrease">Merma:</label>
				    <div class="input-group">
				    	<input type="text" class="form-control" v-model="row.decrease" v-validate:decrease="{ required: true, numeric:true ,minlength: 1, maxlength: 4 }" data-type="text" />
				    	<span class="input-group-addon"><i class="fa fa-percent"></i></span>
				    </div>
				    <div v-if="$validation.decrease.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validation.decrease.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validation.decrease.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validation.decrease.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
						<div v-if="$validation.decrease.numeric">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(numeric) Message Here
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
				{{-- <div class="form-group col-sm-6">
				    <label for="to_buy">Cantidad a comprar:</label>
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
				</div> --}}

				<!-- Perishable Field -->
				<div class="form-group col-sm-6">
					<label for="perishable">Perecible:</label>
					<div class="btn-group">
						<label class="{{-- btn btn-default --}}">
							<input type="radio" id="perishable" value="1" v-model="row.perishable" v-validate:perishable="{ required: true, boolean:true }"> Si
						</label>
						<label class="{{-- btn btn-default --}}">
							<input type="radio" id="perishable" value="0" v-model="row.perishable" v-validate:perishable> No
						</label>
					</div>
					<div v-if="$validation.perishable.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.perishable.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validation.perishable.boolean">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(boolean) Message Here
						</div>
					</div>
				</div>		

				<!-- Auto Provider Field -->
				<div class="form-group col-sm-6">
					<label for="auto_provider">Auto Proveedor:</label>
					<div class="btn-group">
						<label class="{{-- btn btn-default --}}">
							<input type="radio" id="auto_provider" value="1" v-model="row.auto_provider" v-validate:auto_provider="{ required: true, boolean: true }"> Si
						</label>
						<label class="{{-- btn btn-default --}}">
							<input type="radio" id="auto_provider" value="0" v-model="row.auto_provider" v-validate:auto_provider> No
						</label>
					</div>
					<div v-if="$validation.auto_provider.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validation.auto_provider.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validation.auto_provider.boolean">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(boolean) Message Here
						</div>
					</div>
				</div>	

				<!-- Currency Field -->
				<div class="form-group col-sm-6">
				    <label for="currency">Moneda:</label>
				    <input type="text" class="form-control" v-model="row.currency" v-validate:currency="{ required: true, minlength: 1, maxlength: 128 }" 
				    data-type="text" 
				    placeholder="Soles"
				    value="Soles" />
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
			</div>
		</div>
	</div>						
</validator>	
