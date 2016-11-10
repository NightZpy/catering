<modal 
	title="{{ $modalTitle }}" 
	:show.sync="localModals.{{ $modalSync }}" 
	effect="fade" 
	small>
	<div slot="modal-header" class="modal-header">
		<h4 class="modal-title">
		  <b>{!! $modalTitle !!}</b>
		</h4>
	</div>	
	<div slot="modal-body" class="modal-body">
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8">@include('layouts.flash')</div>			
		</div>
	</div>
	<div slot="modal-footer" class="modal-footer">
		<button type="button" class="btn btn-default" 
			@click="closeModal('{{ $modalClose }}')"
		>{{ trans('units.template.buttons.close') }}</button>
		<button type="button" class="btn btn-success" 
			@click="submit('{{ ( $model ? lcfirst($model) : 'null' ) }}', '{{ $type or 'null' }}', '{{ $related or 'null' }}')"
		>Delete</button>
	</div>
</modal>