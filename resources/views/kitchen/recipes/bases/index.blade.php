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
                    index: {
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
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('kitchen.recipes.bases.items.index') }}/"                        
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



