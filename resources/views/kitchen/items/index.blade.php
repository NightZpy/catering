@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">{{ trans('store.index.main-title') }}</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">{{ trans('store.index.buttons.add-new') }}</a>
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
        {{--@include('kitchen.items.providers.add_new')--}}                    
        @include('kitchen.items.units.add')             
        @include('kitchen.items.presentations.add')             
        @include('kitchen.items.families.add')             
        @include('kitchen.items.families.sub.add')
        {{-- @include('kitchen.items.itemTypes.add')              --}}
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
            unique: "{{ route('api.v1.kitchen.items.unique') }}/",
            foreign: {
                unit: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.units.select-list') }}/"
                    }, 
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.units.store') }}/"
                    }
                },
                /*item_type: { 
                    select: {
                        method: 'GET' ,
                        url: "{{-- route('api.v1.kitchen.item.types.select-list') --}}/"
                    }, 
                    store: {
                        method: 'POST' ,
                        url: "{{-- route('api.v1.kitchen.item.types.store') --}}/"
                    }
                },*/
                presentation: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.presentations.select-list') }}/"
                    }, 
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.presentations.store') }}/"
                    }
                },
                family: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.families.select-list') }}/"
                    },
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.families.store') }}/"
                    }
                },
                sub_family: { 
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
                        url: "{{ route('api.v1.subFamilies.store') }}/"
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
                    available_providers: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.items.providers.available-providers') }}/"                        
                    },
                    available: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.items.providers.available') }}/"
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

        /*var loadItemTypes = function () {
            vm.getForeignData(vm.url.foreign.item_type.select.url, 'itemTypesOptions', 'item_type', 'select');
        };*/

        var loadPresentations = function () {
            vm.getForeignData(vm.url.foreign.presentation.select.url, 'presentationOptions', 'presentation', 'select');
        };

        var loadFamilies = function () {
            vm.getForeignData(vm.url.foreign.family.select.url, 'familyOptions', 'family', 'select');
        };

        var loadSubFamilies = function () {
            vm.getForeignData(vm.url.foreign.sub_family.byFamily.url + vm.row.family_id , 'subFamilyOptions', 'sub_family');
        };

        var loadAvailableProviders = function () {
            vm.getForeignData(vm.url.foreign.provider.available_providers.url + vm.row.id, 'providerOptions', 'provider', 'available_providers');
        }        

        vm.$watch('formModal', function (value) {
            if (value) {
                loadUnits();
                loadPresentations();
                loadFamilies();
                //loadItemTypes();
            }
        });

        vm.$watch('row.family_id', function (value) {
            loadSubFamilies();
            this.row.sub_family.family_id = value;
        });

        vm.$watch('row.min_stock', function (value) {
            if ( value <= this.row.current_stock )
                this.row.to_buy = 0;
            else
                this.row.to_buy = value - this.row.current_stock;
        });

        vm.$watch('row.current_stock', function (value) {
            if ( this.row.min_stock <= value )
                this.row.to_buy = 0;
            else
                this.row.to_buy = this.row.min_stock - value;
        });

        vm.$watch('localModals.providerADD', function (value) {
            if (value) 
            {
                var data = {};
                vm.available ( vm.url.foreign.provider.available.url, null, data );
                console.log(data);
                if ( !data ) {
                    vm.localModals.providerADD = false;
                    alert('No hay proveedores disponibles!');
                } else {
                    loadAvailableProviders();
                }
                //console.log("Proveedor");
            }
        });  

        /**
         * Load unit list after add new unit from add new item form
         */
        vm.$watch('localModals.unit_ADD_inform', function (value) {
            if ( !value ) {
                loadUnits();
                this.$validation.unit_id.invalid = false;
                this.$validation.unit_id.valid = true;
            }
        });

        /**
         * Load families list after add new family from add new item form
         */
        vm.$watch('localModals.itemType_ADD_inform', function (value) {
            if ( !value ) {
                loadItemTypes();
            }
        });

        /**
         * Load presentation list after add new presentation from add new item form
         */
        vm.$watch('localModals.presentation_ADD_inform', function (value) {
            if ( !value ) {
                loadPresentations();
                this.$validation.presentation_id.invalid = false;
                this.$validation.presentation_id.valid = true;
            }
        });     

        /**
         * Load families list after add new family from add new item form
         */
        vm.$watch('localModals.family_ADD_inform', function (value) {
            if ( !value ) {
                loadFamilies();
                this.$validation.family_id.invalid = false;
                this.$validation.family_id.valid = true;
            }
        });

        /**
         * Load subfamilies list after add new subfamily from add new item form
         */
        vm.$watch('localModals.subFamily_ADD_inform', function (value) {
            if ( !value ) {
                loadSubFamilies();                
                this.$validation.sub_family_id.invalid = false;
                this.$validation.sub_family_id.valid = true;          
            } else {
                this.$validationsub_family.family_id.invalid = false;
                this.$validationsub_family.family_id.valid = true;
            }
        });

        /*vm.$watch('row.family_id', function (value) {
            if ( value.length > 0 )
                vm.$validation.family_id.invalid = false;
            else
                vm.$validation.family_id.invalid = true;
            vm.$validation.family_id.valid = ! vm.$validation.family_id.invalid;
        });*/

    </script>  
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



