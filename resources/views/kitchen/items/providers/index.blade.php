@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Providers from Item: <strong>{{ $item->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="available ( url.foreign.provider.available.url )" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('providerADD')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.items.index') }}" style="margin-top: -10px;margin-bottom: 5px">Almacen</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.items.providers.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Add) -->
        @include('kitchen.items.providers.add')
        <!-- (Edit) -->
        @include('kitchen.items.providers.edit')
        <!-- (Delete) -->
        @include('kitchen.items.providers.delete')
        <!-- (Show) -->
        @include('kitchen.items.providers.show')
        <!-- (Info) -->
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/item/provider/config.js"></script>
    <script>
        objectRow.id = "{{ $item->id }}";
        objectRow.name = "{{ $item->name }}";
        objectRow.code = "{{ $item->code }}";
        objectRow.auto_provider = "{{ $item->auto_provider }}";
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.items.providers.show', $item->id) }}/",
            index: "{{ route('api.v1.kitchen.items.providers.available-providers', $item->id) }}",  
            store: "{{ route('api.v1.kitchen.items.providers.store', $item->id) }}",  
            update: "{{ route('api.v1.kitchen.items.providers.store', $item->id) }}/",
            delete: "{{ route('api.v1.kitchen.items.providers.delete', $item->id) }}/",
            foreign: {
                provider: {
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.items.providers.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.items.providers.available-providers') }}/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.items.providers.show') }}/"
                    },
                    available_providers: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.items.providers.available-providers') }}/"                        
                    },
                    already_associate: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.items.providers.already-associate') }}/"
                    },
                    available: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.items.providers.available', $item->id) }}/"
                    },
                    delete: {
                        method: 'DELETE',
                        url: "{{ route('api.v1.kitchen.items.providers.delete') }}/"
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

        var loadAvailableProviders = function () {
            vm.getForeignData(vm.url.foreign.provider.available_providers.url + vm.row.id, 'providerOptions', 'provider', 'available_providers');
        }

        vm.$watch('localModals.providerADD', function (value) {
            if (value) {
                if ( ! vm.available ( vm.url.foreign.provider.available.url )) {
                    vm.localModals.providerADD = false;
                    alert('No hay proveedores disponibles!');
                } else {
                    loadAvailableProviders();
                }
            }
        });  

        vm.$watch('localModals.providerEDIT', function (value) {
            if (value)
                 loadAvailableProviders();
        });      
    </script>       
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



