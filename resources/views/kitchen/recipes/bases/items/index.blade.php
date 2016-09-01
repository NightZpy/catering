@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Items para la receta base: <strong>{{ $baseRecipe->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="!available('{{ route('api.v1.kitchen.recipes.bases.items.has-available', $baseRecipe->id) }}')" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('itemADD')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.recipes.bases.index') }}" style="margin-top: -10px;margin-bottom: 5px">Recetas base</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.bases.items.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Add) -->
        @include('kitchen.recipes.bases.items.add')
        <!-- (Edit) -->
        @include('kitchen.recipes.bases.items.edit')
        <!-- (Delete) -->
        @include('kitchen.recipes.bases.items.delete')
        <!-- (Show) -->
        @include('kitchen.recipes.bases.items.show')
        <!-- (Info) -->
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/base/item/config.js"></script>
    <script>
        objectRow.id = "{{ $baseRecipe->id }}";
        objectRow.name = "{{ $baseRecipe->name }}";
        objectRow.code = "{{ $baseRecipe->code }}";
        objectRow.auto_item = "{{ $baseRecipe->auto_item }}";
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.bases.items.show', $baseRecipe->id) }}/",
            index: "{{ route('api.v1.kitchen.recipes.bases.items.available', $baseRecipe->id) }}",  
            store: "{{ route('api.v1.kitchen.recipes.bases.items.store', $baseRecipe->id) }}",  
            update: "{{ route('api.v1.kitchen.recipes.bases.items.store', $baseRecipe->id) }}/",
            delete: "{{ route('api.v1.kitchen.recipes.bases.items.delete', $baseRecipe->id) }}/",
            foreign: {
                item: {
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.available') }}/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.show') }}/"
                    },
                    showOne: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.items.show') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.available') }}/"                        
                    },
                    already_associate: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.already-associate') }}/"
                    },
                    delete: {
                        method: 'DELETE',
                        url: "{{ route('api.v1.kitchen.recipes.bases.items.delete') }}/"
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
        vm.$watch('row.pivot_item.item_id', function (value) {
            var url = apiUrl.foreign.item.showOne.url + value;
            this.getOneData(url, 'decrease', 'row.pivot_item.decrease');            
        });
    </script>     
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



