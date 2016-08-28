@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Recipes</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Add New</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.recipes.form')
        @include('kitchen.recipes.delete')
        @include('kitchen.recipes.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.show') }}/",
            index: "{{ route('api.v1.kitchen.recipes.index') }}",  
            store: "{{ route('api.v1.kitchen.recipes.store') }}",  
            update: "{{ route('api.v1.kitchen.recipes.update') }}/",  
            delete: "{{ route('api.v1.kitchen.recipes.delete') }}/",
            foreign: {
                type: { 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.types.select-list') }}/"
                    }
                },
                base: { 
                    store: {
                        method: 'PATCH' ,
                            url: "{{ route('api.v1.kitchen.recipes.base-recipes.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                            url: "{{ route('kitchen.recipes.base-recipes.index') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                            url: "{{ route('kitchen.recipes.base-recipes.index') }}/"                        
                    }
                },
                utensil: { 
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.utensils.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('kitchen.recipes.utensils.index') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('kitchen.recipes.utensils.index') }}/"                        
                    }
                },

            }
        };
    </script>
    <script src="/app/js/crud.js"></script>    
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



