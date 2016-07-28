@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Providers from Item: <strong>{{ $item->name }}</strong></h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Add New</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('kitchen.items.providers.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('kitchen.items.providers.form')
        @include('kitchen.items.providers.delete')
        @include('kitchen.items.providers.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/item/provider/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.kitchen.items.providers.show', $item->id) }}/",
            index: "{{ route('api.v1.kitchen.items.providers.index', $item->id) }}",  
            store: "{{ route('api.v1.kitchen.items.providers.store', $item->id) }}",  
            {{-- update: "{{ route('api.v1.kitchen.items.providers.update', $item->id) }}/", --}}  
            {{-- delete: "{{ route('api.v1.kitchen.items.providers.delete', $item->id) }}/", --}}
            foreign: {
                index: [{
                   method: 'GET' ,
                   url: "{{ route('api.v1.inputMaterials.basic') }}/"
                }]
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



