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
                    }
                },
                presentation: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.presentations.select-list') }}/"
                    }
                },
                family: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.families.select-list') }}/"
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
        vm.$watch('formModal', function (value) {
            if (value) {
                this.getForeignData(this.url.foreign.unit.select.url, 'unitOptions', 'unit', 'select');
                this.getForeignData(this.url.foreign.presentation.select.url, 'presentationOptions', 'presentation', 'select');
                this.getForeignData(this.url.foreign.family.select.url, 'familyOptions', 'family', 'select');
            }
        });

        vm.$watch('row.family_id', function (value) {
            this.getForeignData(this.url.foreign.subFamily.byFamily.url + this.row.family_id , 'subFamilyOptions', 'subFamily');
        });

        vm.$watch('localModals.providerADD', function (value) {
            if (value) 
                this.getForeignData(this.url.foreign.provider.relate_list.url + this.row.id, 'providerOptions', 'provider', 'relate_list');
        });        
    </script>  
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



