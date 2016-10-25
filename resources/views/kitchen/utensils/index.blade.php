@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left"><strong>Utencilios</strong></h1>
            <div class="btn-group pull-right">
                <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.utensils.categories.index') }}" style="margin-top: -10px;margin-bottom: 5px">Categorias</a>
            </div>
        </section>        
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.utensils.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.utensils.form')
        @include('kitchen.utensils.delete')
        @include('kitchen.utensils.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/utensil/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.utensils.show') }}/",
            index: "{{ route('api.v1.kitchen.utensils.index') }}",  
            store: "{{ route('api.v1.kitchen.utensils.store') }}",  
            update: "{{ route('api.v1.kitchen.utensils.update') }}/",  
            delete: "{{ route('api.v1.kitchen.utensils.delete') }}/",
            foreign: {
                category: { 
                    select: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.utensils.categories.select-list') }}/"
                    }
                },
            }
        };
    </script>  
    <script src="/app/js/crud.js"></script>   
    <script>
        var vm = window.vm;
        vm.$watch('formModal', function (value) {
            if (value)
                this.getForeignData(this.url.foreign.category.select.url, 'utensilCategoriesOptions', 'category', 'select')
        }); 

        vm.$watch('row.category_id', function (value) {
            if ( value.length > 0 || value > 0 )
                vm.$validation.category_id.invalid = false;
            else
                vm.$validation.category_id.invalid = true;
            vm.$validation.category_id.valid = ! vm.$validation.category_id.invalid;
        });        
    </script>       
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



