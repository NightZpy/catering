@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Families</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">Add New</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('families.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('families.form')
        @include('families.delete')
        @include('families.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')      
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.families.show') }}/",
            index: "{{ route('api.v1.families.index') }}",  
            store: "{{ route('api.v1.families.store') }}",  
            update: "{{ route('api.v1.families.update') }}/",  
            delete: "{{ route('api.v1.families.delete') }}/",
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
    <script src="/app/js/models/family-config.js"></script>
    <script src="/app/js/crud.js"></script> 
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



