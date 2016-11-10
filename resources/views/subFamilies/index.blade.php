@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">{{ trans('subfamilies.index.main-title') }}</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">{{ trans('subfamilies.index.buttons.add-new') }}</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('subFamilies.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('subFamilies.form')
        @include('subFamilies.delete')
        @include('subFamilies.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/family/sub/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.subFamilies.show') }}/",
            index: "{{ route('api.v1.subFamilies.index') }}",  
            store: "{{ route('api.v1.subFamilies.store') }}",  
            update: "{{ route('api.v1.subFamilies.update') }}/",  
            delete: "{{ route('api.v1.subFamilies.delete') }}/",
            foreign: {
                family: {
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.families.select-list') }}/"
                    }
                }
            }
        };
    </script>
    <script src="/app/js/crud.js"></script>    
    <script>
        var vm = window.vm;
        vm.$watch('formModal', function (value) {
            if (value) 
                this.getForeignData(this.url.foreign.family.select.url, 'familyOptions', 'family', 'select');
        });

        vm.$watch('row.family_id', function (value) {
            if ( value > 0 )
                vm.$validation.family_id.invalid = false;
            else
                vm.$validation.family_id.invalid = true;
            vm.$validation.family_id.valid = ! vm.$validation.family_id.invalid;
        });
    </script>    
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



