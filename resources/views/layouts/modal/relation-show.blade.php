<modal 
	title="@yield('modal-show-title')" 
	:show.sync="localModals.{{ $modalSync }}" 
	effect="fade" 
	width="800">
	<div slot="modal-header" class="modal-header">
		<h4 class="modal-title">
		  <b>{{ $modalTitle }}</b>
		</h4>
	</div>	
	<div slot="modal-body" class="modal-body">
		<div class="content">
			@include('layouts.flash')
			<div class="box box-primary">
				<div class="box-body">
					<div class="row">
						<div class="col-sm-offset-2 col-sm-8">
							<table class="table-responsive">
								<tbody>
									<template v-for="(field, value) in row">		
										{{-- <div v-if="visible(field)"> --}}
											<tr v-if="isObject(value)">
												<th style="width:50%">@{{ field | capitalize }}</th>
												<td>@{{ value.name }}
												</td>
											</tr>
											<tr v-else>
												<th style="width:50%">@{{ field | capitalize }}</th>
												<td>
													@{{ value }}
												</td>											
											</tr>
										{{-- </div> --}}
									</template>
									{{-- $content --}}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div slot="modal-footer" class="modal-footer">
		<button type="button" class="btn btn-default" 
			@click="closeModal({{ $modalClose }})"
		>Close</button>
	</div>	
</modal>