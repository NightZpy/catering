@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Almacen</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Add New</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.items.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->  
        @include('kitchen.items.form')
        @include('kitchen.items.providers.add')             
        @include('kitchen.items.units.add')             
        @include('kitchen.items.presentations.add')             
        @include('kitchen.items.families.add')             
        @include('kitchen.items.families.sub.add')             
        @include('kitchen.items.delete')
        @include('kitchen.items.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/item/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.items.show') }}/",
            index: "{{ route('api.v1.kitchen.items.index') }}",  
            store: "{{ route('api.v1.kitchen.items.store') }}",  
            update: "{{ route('api.v1.kitchen.items.update') }}/",  
            delete: "{{ route('api.v1.kitchen.items.delete') }}/",
            foreign: {
                unit: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.units.select-list') }}/"
                    }, 
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.units.store') }}"
                    }
                },
                presentation: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.presentations.select-list') }}/"
                    }, 
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.presentations.store') }}"
                    }
                },
                family: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.families.select-list') }}/"
                    },
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.families.store') }}"
                    }
                },
                subFamily: { 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.subFamilies.index') }}/"
                    },
                    byFamily: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.subFamilies.byFamily') }}/"
                    },
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.subFamilies.store') }}"
                    }
                },
                provider: { 
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.items.providers.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('kitchen.items.providers.index') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.items.providers.available-providers') }}/"                        
                    }
                },
            },
            validation: {
                unique: "",
                code: "",
            }
        };
    </script>    
    <script src="/app/js/crud.js"></script>    
    <script>
        var vm = window.vm;

        var loadUnits = function () {
            vm.getForeignData(vm.url.foreign.unit.select.url, 'unitOptions', 'unit', 'select');
        };

        var loadPresentations = function () {
            vm.getForeignData(vm.url.foreign.presentation.select.url, 'presentationOptions', 'presentation', 'select');
        };

        var loadFamilies = function () {
            vm.getForeignData(vm.url.foreign.family.select.url, 'familyOptions', 'family', 'select');
        };

        var loadSubFamilies = function () {
            vm.getForeignData(vm.url.foreign.subFamily.byFamily.url + vm.row.family_id , 'subFamilyOptions', 'subFamily');
        };

        vm.$watch('formModal', function (value) {
            if (value) {
                loadUnits();
                loadPresentations();
                loadFamilies();
            }
        });

        vm.$watch('row.family_id', function (value) {
            loadSubFamilies();
        });

        vm.$watch('localModals.providerADD', function (value) {
            if ( value ) 
                this.getForeignData(this.url.foreign.provider.relate_list.url + this.row.id, 'providerOptions', 'provider', 'relate_list');
        });

        /**
         * Load unit list after add new unit from add new item form
         */
        vm.$watch('localModals.unit_ADD_inform', function (value) {
            if ( !value )
                loadUnits();
        });

        /**
         * Load presentation list after add new presentation from add new item form
         */
        vm.$watch('localModals.presentation_ADD_inform', function (value) {
            if ( !value )
                loadPresentations();
        });     

        /**
         * Load families list after add new family from add new item form
         */
        vm.$watch('localModals.family_ADD_inform', function (value) {
            if ( !value )
                loadFamilies();
        });

        /**
         * Load subfamilies list after add new subfamily from add new item form
         */
        vm.$watch('localModals.subFamily_ADD_inform', function (value) {
            if ( !value )
                loadSubFamilies();
        });

    </script>  
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



