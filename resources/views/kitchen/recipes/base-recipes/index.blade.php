@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Recetas base para la receta: <strong>{{ $recipe->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="!available('{{ route('api.v1.kitchen.recipes.base-recipes.has-available', $recipe->id) }}')" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('baseADD')">Agregar nueva</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.recipes.index') }}" style="margin-top: -10px;margin-bottom: 5px">Recetas</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.recipes.base-recipes.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Add) -->
        @include('kitchen.recipes.base-recipes.add')
        <!-- (Edit) -->
        @include('kitchen.recipes.base-recipes.edit')
        <!-- (Delete) -->
        @include('kitchen.recipes.base-recipes.delete')
        <!-- (Show) -->
        @include('kitchen.recipes.base-recipes.show')
        <!-- (Info) -->
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/recipe/base-recipe/config.js"></script>
    <script>
        objectRow.id = "{{ $recipe->id }}";
        objectRow.name = "{{ $recipe->name }}";
        objectRow.code = "{{ $recipe->code }}";
        objectRow.servings_quantity = "{{ $recipe->servings_quantity }}";
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.recipes.base-recipes.show', $recipe->id) }}/",
            index: "{{ route('api.v1.kitchen.recipes.base-recipes.available', $recipe->id) }}",  
            store: "{{ route('api.v1.kitchen.recipes.base-recipes.store', $recipe->id) }}",  
            update: "{{ route('api.v1.kitchen.recipes.base-recipes.store', $recipe->id) }}/",
            delete: "{{ route('api.v1.kitchen.recipes.base-recipes.delete', $recipe->id) }}/",
            foreign: {
                base: {
                    store: {
                        method: 'PATCH' ,
                        url: "{{ route('api.v1.kitchen.recipes.base-recipes.store') }}/"
                    }, 
                    index: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.bases.index') }}/"
                    },
                    show: {
                        method: 'GET' ,
                        url: "{{ route('api.v1.kitchen.recipes.base-recipes.show') }}/"
                    },
                    relate_list: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.base-recipes.available') }}/"                        
                    },
                    select: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.bases.select-list') }}/"                        
                    },                    
                    already_associate: {
                        method: 'GET',
                        url: "{{ route('api.v1.kitchen.recipes.base-recipes.already-associate') }}/"
                    },
                    delete: {
                        method: 'DELETE',
                        url: "{{ route('api.v1.kitchen.recipes.base-recipes.delete') }}/"
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
        var baseCost = function () {
            var bases = vm.foreignData.baseOptions;
            for (var i = 0; i < bases.length; i++) 
                if ( bases[i].id == vm.row.pivot_base.base_id ) 
                    return (bases[i].cost_mp_x_ration * vm.row.pivot_base.required_quantity).toLocaleString();
            return 0;            
        }

        vm.$watch('localModals.baseADD', function (value) {
            if (value) 
                this.getForeignData(this.url.foreign.base.relate_list.url + this.row.id, 'baseOptions', 'base', 'relate_list');
        });

        vm.$watch('localModals.baseEDIT', function (value) {
            if (value) 
                this.getForeignData(this.url.foreign.base.index.url, 'baseOptions', 'base', 'index');
        });

/*        vm.$watch('row.pivot_base.required_quantity', function (value) {
            if ( value )               
                    vm.$validationBase.required_quantity.unique = false;
                else
                    vm.$validationBase.required_quantity.unique = true;              
        });  */

        vm.$watch('row.pivot_base.base_id', function (value) {
            if ( value > 0 && this.row.pivot_base.required_quantity > 0)
                this.row.pivot_base.cost =  baseCost();
            else 
                this.row.pivot_base.cost = 0;
        });    

        vm.$watch('row.pivot_base.required_quantity', function (value) {
            if ( value > 0 && this.row.pivot_base.base_id > 0)
                this.row.pivot_base.cost = baseCost();
            else
                this.row.pivot_base.cost = 0;
        });       
    </script>        
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



