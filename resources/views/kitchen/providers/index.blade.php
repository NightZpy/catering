@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">{{ trans('providers.index.main-title') }}</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">{{ trans('providers.index.buttons.add-new') }}</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.providers.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.providers.form') <!--kitchen.providers.field $validation-->
        @include('kitchen.providers.delete')
        @include('kitchen.providers.show')
        @include('layouts.modal.info')    
         <!-- (Items) -->
        @include('kitchen.providers.items.add_new') <!--kitchen.providers.items.fields_new validationPivot_item-->
        {{--@include('kitchen.providers.items.add')--}} <!--kitchen.providers.items.fields validationItem-->
        @include('kitchen.items.units.add')             
        @include('kitchen.items.presentations.add')             
        @include('kitchen.items.families.add')             
        @include('kitchen.items.families.sub.add')  
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/provider/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.providers.show') }}/",
            index: "{{ route('api.v1.kitchen.providers.index') }}",  
            store: "{{ route('api.v1.kitchen.providers.store') }}",  
            update: "{{ route('api.v1.kitchen.providers.update') }}/",  
            delete: "{{ route('api.v1.kitchen.providers.delete') }}/",
            foreign: 
            {
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
                item: { 
                    store: {
                        method: 'POST' ,
                        url: "{{ route('api.v1.kitchen.items.store') }}/"
                    },
                    available_items: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.providers.items.available-items') }}/"                        
                    },
                    index: {
                        method: 'GET' ,
                        url: "{{ route('kitchen.providers.items.index') }}/"
                    }
                },
                pivot_item:{
                    associate:{
                        method: 'PATCH',
                        url: "{{ route('api.v1.kitchen.providers.items.store') }}/"
                    }
                }
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
            console.log("Familias");
            vm.getForeignData(vm.url.foreign.family.select.url, 'familyOptions', 'family', 'select');
        };

        var loadSubFamilies = function () {
            vm.getForeignData(vm.url.foreign.sub_family.byFamily.url + vm.row.item.family_id , 'subFamilyOptions', 'sub_family');
        };

        var loadAvailableItems = function () {
            vm.getForeignData(vm.url.foreign.item.available_items.url + vm.row.id, 'itemsOptions', 'item', 'available_items');
        } 

        /*vm.$watch('localModals.itemADD', function (value) {
            if(value)
            {
                loadUnits();
                loadPresentations();
                loadFamilies();
                loadAvailableItems();
            }
        })

        vm.$watch('row.item.family_id', function (value) {
            loadSubFamilies();
            //this.row.sub_family.family_id = value;
        });

        vm.$watch('localModals.family_ADD_inform', function (value) {
            if (!value) {
                loadFamilies();
                this.$validationItem.family_id.invalid = false;
                this.$validationItem.family_id.valid = true;
            }
        });*/


    </script>
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



