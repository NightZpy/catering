<validator name="validationItem">	
	<!-- item Id Field -->
	<div class="form-group col-sm-6" @click="getForeignData('{{ route('api.v1.kitchen.recipes.bases.items.available') }}/' + row.id, 'itemOptions', 'item')" class="form-group col-sm-6">
	    <label for="item_id">Item:</label>
		<select class="form-control" v-model="row.pivot_item.item_id" v-validate:item_id="{ required: true }">
			<option selected="selected">-- Seleccione un item --</option>
			<option v-for="item in foreignData.itemOptions" 
				v-bind:selected="item.id == row.item.id"
				v-bind:value="item.id">		
				@{{ item.name + ' - ' + item.presentation }}
			</option>
		</select>
	    <div v-if="$validationItem.item_id.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationItem.item_id.required"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				El item es obligatorio
			</div>
		</div> 
	</div>

	<!-- Decrease Field -->
	<div class="form-group col-sm-6">
	    <label for="decrease">Merma:</label>
	    <input 
	    	type="text" class="form-control" style="background-color: yellow; font-weight: bold" 
	    	v-model="row.pivot_item.decrease" 
	    	v-validate:decrease="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationItem.decrease.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationItem.decrease.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validationItem.decrease.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
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

	<!-- Cost per quantity Field -->
	<div class="form-group col-sm-6">
	    <label for="cost_per_quantity">Costo por cantidad:</label>
	    <input type="text" class="form-control" v-model="row.pivot_item.cost_per_quantity" v-validate:cost_per_quantity="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationItem.cost_per_quantity.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationItem.cost_per_quantity.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validationItem.cost_per_quantity.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
			<div v-if="$validationItem.cost_per_quantity.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationItem.cost_per_quantity.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>

	<!-- Purchase quantity Field -->
	<div class="form-group col-sm-6">
	    <label for="purchase_quantity">Cantidad de compra:</label>
	    <input type="text" class="form-control" v-model="row.pivot_item.purchase_quantity" v-validate:purchase_quantity="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationItem.purchase_quantity.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationItem.purchase_quantity.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validationItem.purchase_quantity.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
			<div v-if="$validationItem.purchase_quantity.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationItem.purchase_quantity.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>

	<!-- Decrease Field -->
	<div class="form-group col-sm-6">
	    <label for="servings_quantity">Ración:</label>
	    <input type="text" class="form-control" v-model="row.pivot_item.servings_quantity" v-validate:servings_quantity="{ required: true, minlength: 1, maxlength: 13 }" data-type="text" />
	    <div v-if="$validationItem.servings_quantity.invalid" class="alert alert-danger" role="alert">
			<div v-if="$validationItem.servings_quantity.required">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(required) Message Here
			</div>
			{{-- <div v-if="$validationItem.servings_quantity.unique">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(unique) Message Here
			</div> --}}
			<div v-if="$validationItem.servings_quantity.minlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(minlength) Message Here
			</div>
			<div v-if="$validationItem.servings_quantity.maxlength">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Custom rule(maxlength) Message Here
			</div>
		
		</div>
	</div>				
</validator>	
