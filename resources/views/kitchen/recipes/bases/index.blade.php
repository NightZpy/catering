@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">BaseRecipes</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Add New</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.bases.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.recipes.bases.form')
        @include('kitchen.recipes.bases.items.add')
        @include('kitchen.recipes.bases.delete')
        @include('kitchen.recipes.bases.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/base/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.bases.show') }}/",
            index: "{{ route('api.v1.kitchen.recipes.bases.index') }}",  
            store: "{{ route('api.v1.kitchen.recipes.bases.store') }}",  
            update: "{{ route('api.v1.kitchen.recipes.bases.update') }}/",  
            delete: "{{ route('api.v1.kitchen.recipes.bases.delete') }}/",
            foreign: {
                type: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.types.select-list') }}/"
                    }
                },
                item: { 
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('kitchen.recipes.bases.items.index') }}/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.items.show') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.available') }}/"
                    }
                },
                utensil: { 
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('kitchen.recipes.bases.utensils.index') }}/"
                    },
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.utensils.select-list') }}/"                        
                    }
                },

            }
        };
    </script>
    <script src="/app/js/crud.js"></script>    
    <script>
        var vm = window.vm; 
        
        vm.$watch('formModal', function (value) {
            if (value) {
                this.getForeignData(this.url.foreign.type.select.url, 'typeOptions', 'type', 'select');
                this.getForeignData(this.url.foreign.utensil.select.url, 'utensilOptions', 'utensil', 'select');
            }
        });

        vm.$watch('localModals.itemADD', function (value) {
            if (value) 
                this.getForeignData(this.url.foreign.item.relate_list.url + this.row.id, 'itemOptions', 'item', 'relate_list');
        });

        /*vm.$watch('localModals.utensilADD', function (value) {
            if (value) 
                this.getForeignData(this.url.foreign.utensil.relate_list.url + this.row.id, 'utensilOptions', 'utensil', 'relate_list');
        });*/

        vm.$watch('row.pivot_item.item_id', function (value) {
            if (value != undefined) {
                var url = apiUrl.foreign.item.show.url + value;
                this.getOneData(url, 'decrease', 'row.pivot_item.decrease');            
            }
        });

        vm.$watch('row.pivot_utensil.utensil_id', function (value) {
            if ( value.length > 0 )
                vm.$validation.utensil_id.invalid = false;
            else
                vm.$validation.utensil_id.invalid = true;
            vm.$validation.utensil_id.valid = ! vm.$validation.utensil_id.invalid;
        });         
    </script>
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush