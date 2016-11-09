<validator name="validationPivot_item">			
	<!-- Price Field -->
	<div class="form-group col-sm-6">
	    <label for="price">Precio:</label>
	    <input type="text" class="form-control" v-model="row.pivot_item.price" v-validate:price="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationPivot_item.price.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationPivot_item.price.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validationPivot_item.price.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
			<div v-if="$validationPivot_item.price.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationPivot_item.price.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>	

	<!-- Selected Provider Field -->
	<div class="form-group col-sm-12">
		<label for="selected">¿Seleccionar este item?</label>
		<div class="btn-group">
			<label class="btn btn-default">
				<input type="radio" id="selected" value="1" v-model="row.pivot_item.selected" v-validate:selected="{ required: true }"> Si
			</label>
			<label class="btn btn-default">
				<input type="radio" id="selected" value="0" v-model="row.pivot_item.selected" v-validate:selected> No
			</label>
		</div>
		<div v-if="$validationPivot_item.selected.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationPivot_item.selected.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
		</div>
	</div>

	<!-- Provider Id Field -->
	<div class="form-group col-sm-6" class="form-group col-sm-6">
	    <label for="item_id">Item:</label>
		{{-- <v-select></v-select> --}}
		<div class="input-group">
			<select class="form-control" v-model="row.pivot_item.item_id" v-validate:item_id="{ required: true }">
				<option value="" selected="selected">-- Seleccione un item --</option>
				<option v-for="option in foreignData.itemsOptions" v-bind:value="option.id">		
					@{{ option.name }}
				</option>
			</select>
			<span class="input-group-btn">
				<button class="btn btn-primary" @click="modal('item_ADD_inform')">
		    		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	    		</button>
		  	</span>
		</div>
	    <div v-if="$validationPivot_item.item_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationPivot_item.item_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				El item es obligatorio
			</div>
		</div> 
	</div>			
</validator>