@extends('layouts.app')

@section('content')
    <div id="crud-app">
        <section class="content-header">
            <h1 class="pull-left">Items from Providers: <strong>{{ $provider->name }}</strong></h1>
            <div class="btn-group pull-right">
                <a v-if="available ( url.foreign.provider.available.url )" class="btn btn-primary pull-right" href="#" style="margin-top: -10px;margin-bottom: 5px" @click="modal('providerADD')">Add New</a>
                <a class="btn btn-primary pull-right bg-olive btn-flat" href="{{ route('kitchen.items.index') }}" style="margin-top: -10px;margin-bottom: 5px">Almacen</a>
            </div>
        </section>
        <div class="content" style="padding-top: 30px;">
            <div class="box box-primary">
                <div class="box-body">
                    {{--@include('kitchen.providers.items.table')--}}
                </div>
            </div>
        </div>
        <!-- --------- Modals ---------- -->
        <!-- (Add) -->
      
    </div>
@endsection

@push('vue-scripts')  
    <script src="/app/js/models/kitchen/item/provider/config.js"></script>
    <script>
        
    </script>
    <script src="/app/js/crud.js"></script>  
    <script>
        var vm = window.vm;
    </script>       
@endpush

@push('vue-styles')
    <link rel="stylesheet" href="/app/css/vue-styles.css">
@endpush
