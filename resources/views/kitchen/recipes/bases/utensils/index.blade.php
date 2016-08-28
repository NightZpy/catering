@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Utensils para la receta base: <strong>{{ $baseRecipe->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="!available('{{ route('api.v1.kitchen.recipes.bases.utensils.has-available', $baseRecipe->id) }}')" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('utensilADD')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.recipes.bases.index') }}" style="margin-top: -10px;margin-bottom: 5px">Recetas base</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.bases.utensils.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Add) -->
        @include('kitchen.recipes.bases.utensils.add')
        <!-- (Edit) -->
        @include('kitchen.recipes.bases.utensils.edit')
        <!-- (Delete) -->
        @include('kitchen.recipes.bases.utensils.delete')
        <!-- (Show) -->
        @include('kitchen.recipes.bases.utensils.show')
        <!-- (Info) -->
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/base/utensil/config.js"></script>
    <script>
        objectRow.id = "{{ $baseRecipe->id }}";
        objectRow.name = "{{ $baseRecipe->name }}";
        objectRow.code = "{{ $baseRecipe->code }}";
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.bases.utensils.show', $baseRecipe->id) }}/",
            index: "{{ route('api.v1.kitchen.recipes.bases.utensils.available', $baseRecipe->id) }}",  
            store: "{{ route('api.v1.kitchen.recipes.bases.utensils.store', $baseRecipe->id) }}",  
            update: "{{ route('api.v1.kitchen.recipes.bases.utensils.store', $baseRecipe->id) }}/",
            delete: "{{ route('api.v1.kitchen.recipes.bases.utensils.delete', $baseRecipe->id) }}/",
            foreign: {
                utensil: {
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.available') }}/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.show') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.available') }}/"                        
                    },
                    already_associate: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.already-associate') }}/"
                    },
                    delete: {
                        method: 'DELETE',
                        url: "{{ route('api.v1.kitchen.recipes.bases.utensils.delete') }}/"
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
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



