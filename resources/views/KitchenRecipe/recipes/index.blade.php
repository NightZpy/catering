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
                    @include('KitchenRecipe.recipes.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('KitchenRecipe.recipes.form')
        @include('KitchenRecipe.recipes.delete')
        @include('KitchenRecipe.recipes.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/recipe-config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.KitchenRecipe.recipes.show') }}/",
            index: "{{ route('api.v1.KitchenRecipe.recipes.index') }}",  
            store: "{{ route('api.v1.KitchenRecipe.recipes.store') }}",  
            update: "{{ route('api.v1.KitchenRecipe.recipes.update') }}/",  
            delete: "{{ route('api.v1.KitchenRecipe.recipes.delete') }}/"
        };
    </script>
    <script src="/app/js/crud.js"></script>    
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



