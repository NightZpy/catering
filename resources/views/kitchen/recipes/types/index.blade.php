@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">{{ trans('recipeType.index.main-title') }}</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">{{ trans('recipeType.index.buttons.add-new') }}</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.types.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.recipes.types.form')
        @include('kitchen.recipes.types.delete')
        @include('kitchen.recipes.types.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/type/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.types.show') }}/",
            index: "{{ route('api.v1.kitchen.recipes.types.index') }}",  
            store: "{{ route('api.v1.kitchen.recipes.types.store') }}",  
            update: "{{ route('api.v1.kitchen.recipes.types.update') }}/",  
            delete: "{{ route('api.v1.kitchen.recipes.types.delete') }}/"
        };
    </script>
    <script src="/app/js/crud.js"></script>    
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



