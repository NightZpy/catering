@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Items from Providers: <strong>{{ $provider->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="available ( url.foreign.provider.available.url )" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('providerADD')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.items.index') }}" style="margin-top: -10px;margin-bottom: 5px">Almacen</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.providers.items.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Show) -->
        @include('kitchen.providers.items.show')
        <!-- (Edit) -->
        @include('kitchen.providers.items.edit')
        @include('kitchen.providers.items.add')
        <!-- (Delete) -->
        @include('kitchen.providers.items.delete')

        @include('kitchen.items.units.add')             
        @include('kitchen.items.presentations.add')             
        @include('kitchen.items.families.add')             
        @include('kitchen.items.families.sub.add')

      
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/provider/item/config.js"></script>
    <script>
        objectRow.id = "{{ $provider->id }}";
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.providers.items.show', $provider->id) }}/",
            index: "",  
            store: "",  
            update: "/",
            delete: "{{ route('api.v1.kitchen.providers.items.delete', $provider->id) }}/",
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
                        method: 'PATCH' ,
                        url: "/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.providers.items.show') }}/"
                    },
                    available_items: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.providers.items.available') }}/"                        
                    },
                    already_associate: {
                        method: 'GET',
                        url: "/"
                    },
                    available: {
                        method: 'GET',
                        url: "/"
                    },
                    delete: {
                        method: 'DELETE',
                        url: "{{ route('api.v1.kitchen.providers.items.delete') }}/"
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

        var loadFamilies = function () {
            vm.getForeignData(vm.url.foreign.family.select.url, 'familyOptions', 'family', 'select');
        };

        var loadAvailableItems = function () {
            vm.getForeignData(vm.url.foreign.item.available_items.url + vm.row.id, 'itemsOptions', 'item', 'available_items');
        } 

        /**
         * Load families list after add new family from add new item form
         */
        vm.$watch('localModals.itemEDIT', function (value) {
            if (value) {
                loadFamilies();
                loadAvailableItems();
            }
        });

    </script>       
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush
