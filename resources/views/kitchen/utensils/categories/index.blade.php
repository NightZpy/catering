@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">{{ trans('utensilsCategory.index.main-title') }}</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">{{ trans('utensilsCategory.index.buttons.add-new') }}</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.utensils.categories.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.utensils.categories.form')
        @include('kitchen.utensils.categories.delete')
        @include('kitchen.utensils.categories.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/utensil/category/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.utensils.categories.show') }}/",
            index: "{{ route('api.v1.kitchen.utensils.categories.index') }}",  
            store: "{{ route('api.v1.kitchen.utensils.categories.store') }}",  
            update: "{{ route('api.v1.kitchen.utensils.categories.update') }}/",  
            delete: "{{ route('api.v1.kitchen.utensils.categories.delete') }}/"
        };
    </script>
    <script src="/app/js/crud.js"></script>    
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



