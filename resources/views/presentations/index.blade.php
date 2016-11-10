@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">{{ trans('presentations.index.main-title') }}</h1>
            <h1 class="pull-right">
               <a class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('POST')">{{ trans('presentations.index.buttons.add-new') }}</a>
            </h1>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    @include('presentations.table')
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        @include('presentations.form')
        @include('presentations.delete')
        @include('presentations.show')
        @include('layouts.modal.info')        
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/presentation/config.js"></script>
    <script>
        var token = '{{ csrf_token() }}';
        var fieldInitOrder = 'id';
        var apiUrl = { 
            show:  "{{ route('api.v1.presentations.show') }}/",
            index: "{{ route('api.v1.presentations.index') }}",  
            store: "{{ route('api.v1.presentations.store') }}",  
            update: "{{ route('api.v1.presentations.update') }}/",  
            delete: "{{ route('api.v1.presentations.delete') }}/"
        };
    </script>
    <script src="/app/js/crud.js"></script>    
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush



