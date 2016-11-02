<validator name="validationItem">
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
						<select class="form-control" v-model="row.item.family_id" v-validate:family_id="{ required: true }">
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
				    <div v-if="$validationItem.family_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.family_id.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La familia es obligatoria
						</div>
					</div> 
				</div>

				<!-- SubFamily Id Field -->
				<div class="form-group col-sm-6" class="form-group col-sm-6">
				    <label for="sub_family_id">Sub-Familia:</label>
				    <div class="input-group">
						<select :disabled="" class="form-control" v-model="row.item.sub_family_id" v-validate:sub_family_id="{ required: true }">
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
				    <div v-if="$validationItem.sub_family_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.sub_family_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La sub-familia es obligatoria
						</div>
					</div> 
				</div>

				<!-- Name Field -->
				<div class="form-group col-sm-6">
				    <label for="name">Nombre:</label>
				    <input type="text" class="form-control" 
				    	v-model="row.item.name" 
				    	v-validate:name="{ {{-- email: true, --}} required: true, minlength: 1, maxlength: 128 }" data-type="text" />
				    <div v-if="$validationItem.name.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.name.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						{{-- <div v-if="$validationItem.name.email">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							@{{ $validationItem.name.email }}
						</div> --}}
						{{-- <div v-if="$validationItem.name.unique">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(unique) Message Here
						</div> --}}
						{{-- <div v-if="$validationItem.name.unique">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Ya existe un Item con este nombre!
						</div> --}}
						<div v-if="$validationItem.name.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.name.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					
					</div>
				</div>	

				<!-- Type Id Field -->
				<div class="form-group col-sm-6">
				    <label for="type">Tipo:</label>
				    <input type="text" class="form-control" v-model="row.item.type" v-validate:type="{ required: true, minlength: 1, maxlength: 128 }" data-type="text" />
				    <div v-if="$validationItem.type.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validationItem.type.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						{{-- <div v-if="$validationItem.type.unique">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(unique) Message Here
						</div> --}}
						<div v-if="$validationItem.type.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.type.maxlength">
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
						<select class="form-control" v-model="row.item.unit_id" v-validate:unit_id="{ required: true }">
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
				    <div v-if="$validationItem.unit_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.unit_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La unidad es obligatoria
						</div>
					</div> 
				</div>

				<!-- Presentation Id Field -->
				<div class="form-group col-sm-6">
				    <label for="presentation_id">Presentación:</label>
				    <div class="input-group">
						<select class="form-control" v-model="row.item.presentation_id" v-validate:presentation_id="{ required: true }">
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
				    <div v-if="$validationItem.presentation_id.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.presentation_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							La presentación es obligatoria
						</div>
					</div> 
				</div>	              
			</div>
			<div class="tab-pane" id="storage">
				<!-- Currency Field -->
				<div class="form-group col-sm-6">
				    <label for="currency">Moneda:</label>
				    <input type="text" class="form-control" v-model="row.item.currency" v-validate:currency="{ required: true, minlength: 1, maxlength: 128 }" 
				    data-type="text" 
				    placeholder="Soles"
				    value="Soles" />
				    <div v-if="$validationItem.currency.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validationItem.currency.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validationItem.currency.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.currency.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					
					</div>
				</div>

				<!-- min Stock Field -->
				<div class="form-group col-sm-6">
				    <label for="decrease">Merma:</label>
				    <input type="text" class="form-control" v-model="row.item.decrease" v-validate:decrease="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
				    <div v-if="$validationItem.decrease.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validationItem.decrease.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validationItem.decrease.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.decrease.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					</div>
				</div>					

				<!-- min Stock Field -->
				<div class="form-group col-sm-6">
				    <label for="min_stock">Stock mínimo:</label>
				    <input type="number" class="form-control" v-model="row.item.min_stock" v-validate:min_stock="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
				    <div v-if="$validationItem.min_stock.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validationItem.min_stock.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validationItem.min_stock.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.min_stock.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					</div>
				</div>	

				<!-- current_stock Field -->
				<div class="form-group col-sm-6">
				    <label for="current_stock">Cantidad:</label>
				    <input type="number" class="form-control" v-model="row.item.current_stock" v-validate:current_stock="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
				    <div v-if="$validationItem.current_stock.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validationItem.current_stock.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validationItem.current_stock.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.current_stock.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					
					</div>
				</div>

				<!-- to_buy Field -->
				<div class="form-group col-sm-6">
				    <label for="to_buy">Cantidad a comprar:</label>
				    <input type="number" class="form-control" v-model="row.item.to_buy" v-validate:to_buy="{ required: true, minlength: 1, maxlength: 4 }" data-type="text" />
				    <div v-if="$validationItem.to_buy.invalid" class="alert alert-danger" role="alert">
							<div v-if="$validationItem.to_buy.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
						<div v-if="$validationItem.to_buy.minlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(minlength) Message Here
						</div>
						<div v-if="$validationItem.to_buy.maxlength">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(maxlength) Message Here
						</div>
					
					</div>
				</div>

				<!-- Perishable Field -->
				<div class="form-group col-sm-6">
					<label for="perishable">Perecible:</label>
					<div class="btn-group">
						<label class="btn btn-default">
							<input type="radio" id="perishable" value="1" v-model="row.item.perishable" v-validate:perishable="{ required: true }"> Si
						</label>
						<label class="btn btn-default">
							<input type="radio" id="perishable" value="0" v-model="row.item.perishable" v-validate:perishable> No
						</label>
					</div>
					<div v-if="$validationItem.perishable.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.perishable.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
					</div>
				</div>		

				<!-- Auto Provider Field -->
				<div class="form-group col-sm-6">
					<label for="auto_provider">Auto Proveedor:</label>
					<div class="btn-group">
						<label class="btn btn-default">
							<input type="radio" id="auto_provider" value="1" v-model="row.item.auto_provider" v-validate:auto_provider="{ required: true }"> Si
						</label>
						<label class="btn btn-default">
							<input type="radio" id="auto_provider" value="0" v-model="row.item.auto_provider" v-validate:auto_provider> No
						</label>
					</div>
					<div v-if="$validationItem.auto_provider.invalid" class="alert alert-danger" role="alert">
						<div v-if="$validationItem.auto_provider.required">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Custom rule(required) Message Here
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>						
</validator>	
