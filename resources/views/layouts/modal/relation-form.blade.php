<modal 
	title="@yield('modal-title')" 
	:show.sync="localModals.@yield('modal-sync')" 
	effect="fade" 
	width="800"
>
	<div slot="modal-header" class="modal-header">
		<h4 class="modal-title">
		  <b>@yield('modal-relation-form-title')</b>
		</h4>
	</div>	
	<div slot="modal-body" class="modal-body">
		<div class="content">
			@include('layouts.flash')
			<div class="box box-primary">
				<div class="box-body">
					<div class="row">
						@yield('modal-relation-form-content')
					</div>
				</div>
			</div>
		</div>
	</div>
	<div slot="modal-footer" class="modal-footer">
		<button type="button" class="btn btn-default" 
			@click="closeModal(@yield('modal-close'))"
		>Close</button>
		<button type="button" class="btn btn-success" 
			@click="submit(@yield('related', 'null'))"
			v-if="{{  '$validation' }}@yield('model').valid"
		>Save</button>
	</div>	
</modal>