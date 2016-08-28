@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Utensils para la receta base: <strong>{{ $recipe->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="!available('{{ route('api.v1.kitchen.recipes.utensils.has-available', $recipe->id) }}')" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('utensilADD')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.recipes.index') }}" style="margin-top: -10px;margin-bottom: 5px">Recetas</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.utensils.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Add) -->
        @include('kitchen.recipes.utensils.add')
        <!-- (Edit) -->
        @include('kitchen.recipes.utensils.edit')
        <!-- (Delete) -->
        @include('kitchen.recipes.utensils.delete')
        <!-- (Show) -->
        @include('kitchen.recipes.utensils.show')
        <!-- (Info) -->
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/utensil/config.js"></script>
    <script>
        objectRow.id = "{{ $recipe->id }}";
        objectRow.name = "{{ $recipe->name }}";
        objectRow.code = "{{ $recipe->code }}";
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.utensils.show', $recipe->id) }}/",
            index: "{{ route('api.v1.kitchen.recipes.utensils.available', $recipe->id) }}",  
            store: "{{ route('api.v1.kitchen.recipes.utensils.store', $recipe->id) }}",  
            update: "{{ route('api.v1.kitchen.recipes.utensils.store', $recipe->id) }}/",
            delete: "{{ route('api.v1.kitchen.recipes.utensils.delete', $recipe->id) }}/",
            foreign: {
                utensil: {
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.utensils.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.utensils.available') }}/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.utensils.show') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.utensils.available') }}/"                        
                    },
                    already_associate: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.utensils.already-associate') }}/"
                    },
                    delete: {
                        method: 'DELETE',
                        url: "{{ route('api.v1.kitchen.recipes.utensils.delete') }}/"
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



